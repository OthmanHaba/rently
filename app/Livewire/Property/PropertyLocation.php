<?php

namespace App\Livewire\Property;

use App\Livewire\CreatePropertyForm;
use Livewire\Component;

class PropertyLocation extends CreatePropertyForm
{
    public function updatedselect()
    {
        $this->dispatch('selectChanged', $this->select);
    }
    public function render()
    {
        return view('livewire.property.property-location');
    }
}
