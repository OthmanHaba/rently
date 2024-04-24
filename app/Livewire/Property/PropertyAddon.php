<?php

namespace App\Livewire\Property;

use App\Livewire\CreatePropertyForm;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
class PropertyAddon extends CreatePropertyForm
{
    public function updatedselectedValues()
    {
        $this->dispatch('selectedValuesChanged', $this->selectedValues[]);
    }

    public function render()
    {
        $categories = DB::table('categories')
            ->select('name','id')
            ->get();
        return view('livewire.property.property-addon',['categories'=>$categories]);
    }
}
