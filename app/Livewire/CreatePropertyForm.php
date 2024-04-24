<?php

namespace App\Livewire;

use App\Models\Property;
use App\Models\Category;
use App\Models\PropertyAddOns;
use App\Models\PropertyPolicy;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class CreatePropertyForm extends Component
{
    public $currentPage=1;
    public $success;

    public $title;
    public $description;
    public $address;
    public $longDescription;
    public $numberOfRooms;
    public $select;
    public $selectedValues=[];
    // Form properties

    public $rooms;
    public $Bathrooms;
    public $Beds;
    public $Guests;

    public $pages = [
        1 => [
            'heading' => 'Owner Information',
            'subheading' => 'Enter your name and email to get started.',
        ],
        2 => [
            'heading' => 'Property Location',
            'subheading' => 'Enter your Property Location.',
        ],
        3 => [
            'heading' => 'Property Addon',
            'subheading' => 'Enter your Property Addon.',
        ],
        4 => [
            'heading' => 'Property Preferences',
            'subheading' => 'Enter your Property Preferences.',
        ],
        5 => [
            'heading' => 'Payment',
            'subheading' => 'Enter Payment.',
        ],
    ];

    private $validationRules = [
        1 => [
            'title' => ['required', 'string', 'min:3'],
            'description' => ['required', 'string', 'min:20'],
            'address' => ['required', 'string', 'min:3'],
            'longDescription' => ['required', 'string', 'min:25'],
            'numberOfRooms' => ['required'],
        ],
        2 => [
            'select' => ['required'],
        ],
        //3 => [],
//        4 => [
//            'a' => ['required', 'string', 'min:8'],
//            'b' => ['required', 'string', 'min:8'],
//        ],
//        5 => [
//            'a' => ['required', 'string', 'min:8'],
//            'b' => ['required', 'string', 'min:8'],
//        ],
    ];

    protected $listeners = ['fullNameChanged','PhoneChanged','emailChanged','passwordChanged','confirmPasswordChanged','selectChanged','GuestsChanged','selectedValuesChanged'];
    public function fullNameChanged($value)
    {
        //Auth::user()->name;
        $this->title = $value;
    }
    public function PhoneChanged($value)
    {
        $this->description = $value;
    }
    public function GuestsChanged($value)
    {
        $this->Guests = $value;
    }
    public function emailChanged($value)
    {
        $this->address = $value;
    }
    public function passwordChanged($value)
    {
        $this->longDescription = $value;
    }
    public function confirmPasswordChanged($value)
    {
        $this->numberOfRooms = $value;
    }
    public function selectChanged($value)
    {
        $this->select = $value;
    }
public function selectedValuesChanged($value)
    {
        $this->selectedValues = $value;
    }
    public function updated($propertyName): void
    {
        if (array_key_exists($this->currentPage, $this->validationRules)) {
            $this->validateOnly($propertyName, $this->validationRules[$this->currentPage]);
        }
    }

    public function goToNextPage(): void

    {
        if (array_key_exists($this->currentPage, $this->validationRules)) {
            $this->validate($this->validationRules[$this->currentPage]);
        }
        $this->currentPage++;
    }

    public function goToPreviousPage(): void
    {
        $this->currentPage--;
    }

    public function resetSuccess(): void
    {
        $this->reset('success');
    }

    public function submit(): void
    {
        $rules = collect($this->validationRules)->collapse()->toArray();

        $this->validate($rules);

        Property::create([
            'owner_id'=>Auth::user()->id,
            'title' => "{$this->title}",
            'lat' => '0',
            'log' => '0',
            'address' => "{$this->address}",
            'description' => "{$this->description}",
            'longDescription' => "{$this->longDescription}",
            'numberOfRooms' => "{$this->numberOfRooms}",
            'location_id' => "11",
            'view' => "test",
            'status' => "In Process",
        ]);
        Location::create([
            'name' => "{$this->select}",
        ]);
        $latestProperty = DB::table('properties')
            ->select('id')
            ->latest() // يرتب النتائج بحسب تاريخ الإنشاء بتنازلي
            ->first(); // يسترجع أول سجل من النتيجة بعد الترتيب
        foreach ($this->selectedValues as $selectedValue)
        {
            Category::create([
                'category_id' => "{$this->$selectedValue}",
                'property_id' => "{$this->$latestProperty}",
            ]);
        }

        $this->reset();
        $this->resetValidation();

        $this->success = 'User created successfully!';
    }
    public function render()
    {
        return view('livewire.CreatePropertyForm');
    }
}
