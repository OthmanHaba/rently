<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Calender extends Component
{

    public $month;
    public $year;
    public $selectedStartDate = null;
    public $selectedEndDate = null;


    protected $listeners = ['goToNextMonth', 'goToPrevMonth'];



// Add methods to handle day clicks
    public function selectDay($day)
    {
        $date = Carbon::createFromDate($this->year, $this->month, $day);
        if (!$this->selectedStartDate || $date->lessThan(Carbon::parse($this->selectedStartDate))) {
            $this->selectedStartDate = $date->toDateString();
            $this->selectedEndDate = null;
        } elseif (!$this->selectedEndDate || $date->greaterThan(Carbon::parse($this->selectedEndDate))) {
            $this->selectedEndDate = $date->toDateString();
        }
    }
    public function getTotalDaysAttribute()
    {
        if ($this->selectedStartDate && $this->selectedEndDate) {
            return Carbon::parse($this->selectedStartDate)->diffInDays(Carbon::parse($this->selectedEndDate)) + 1;
        }
        return 0;
    }

    public function mount()
    {
        $this->month = now()->month;
        $this->year = now()->year;
    }

    public function goToNextMonth()
    {
        $date = Carbon::createFromDate($this->year, $this->month, 1)->addMonth();
        $this->month = $date->month;
        $this->year = $date->year;
    }

    public function goToPrevMonth()
    {
        $date = Carbon::createFromDate($this->year, $this->month, 1)->subMonth();
        $this->month = $date->month;
        $this->year = $date->year;
    }

    public function render()
    {
        $date = Carbon::createFromDate($this->year, $this->month, 1);
        $daysInMonth = $date->daysInMonth;
        $firstDayOfWeek = $date->dayOfWeek;

        return view('livewire.calender', [
            'daysInMonth' => $daysInMonth,
            'firstDayOfWeek' => $firstDayOfWeek,
        ]);
    }
}
