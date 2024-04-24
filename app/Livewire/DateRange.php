<?php

namespace App\Livewire;

use Livewire\Component;

class DateRange extends Component
{

    public $startDate;
    public $endDate;

    public $dayClass = '';

    public function mount($dayClass)
    {
        $this->dayClass = $dayClass;
    }
    public function render()
    {
        return view('livewire.date-range');
    }
}
