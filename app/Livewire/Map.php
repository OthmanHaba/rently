<?php

namespace App\Livewire;

use Livewire\Component;

class Map extends Component
{
    public $latitude = 0;
    public $longitude = 0;

    /*public function mount($lat , $log)
    {
        $this->latitude = 32.556325;
        $this->longitude = 13.109851;
    }*/
    public function mount($latitude = 0, $longitude = 0)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function render()
    {
        return view('livewire.map');
    }
}
