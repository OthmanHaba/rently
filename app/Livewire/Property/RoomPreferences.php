<?php

namespace App\Livewire\Property;

use App\Livewire\CreatePropertyForm;
use Livewire\Component;

class RoomPreferences extends CreatePropertyForm
{
    public function updatedGuests()
    {
        $this->dispatch('GuestsChanged', $this->Guests);
    }
    public function render()
    {
        return view('livewire.property.room-preferences');
    }
}
