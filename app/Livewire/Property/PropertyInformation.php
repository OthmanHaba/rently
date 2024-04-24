<?php

namespace App\Livewire\Property;

use Livewire\Component;
use App\Livewire\CreatePropertyForm;

class PropertyInformation extends CreatePropertyForm
{

    public function updatedtitle()
    {
        $this->dispatch('fullNameChanged', $this->title);
    }
    public function updateddescription()
    {
        $this->dispatch('PhoneChanged', $this->description);
    }
    public function updatedaddress()
    {
        $this->dispatch('emailChanged', $this->address);
    }
    public function updatedlongDescription()
    {
        $this->dispatch('passwordChanged', $this->longDescription);
    }
    public function updatednumberOfRooms()
    {
        $this->dispatch('confirmPasswordChanged', $this->numberOfRooms);
    }
    public function updatedselect()
    {
        $this->dispatch('selectChanged', $this->select);
    }
    public function render()
    {
        return view('livewire.property.property-information');
    }
}
