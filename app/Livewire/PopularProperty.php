<?php

namespace App\Livewire;

use App\Models\Like;
use Livewire\Component;

class PopularProperty extends Component
{
    public $property;
    public $user_id;

    public function mount($property, $user_id)
    {
        $this->property = $property;
        $this->user_id = $user_id;
    }


    public function like($propertyId)
    {
        $userId = auth()->id();

        $like = Like::where([
            'user_id' => $userId,
            'property_id' => $propertyId,
        ])->first();

        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'property_id' => $propertyId,
                'user_id' => $userId
            ]);
        }
    }

    public function render()
    {
        $isLiked = Like::where([
            'property_id' => $this->property->id,
            'user_id' => $this->user_id,
        ])->exists();

        $this->property->load('location','prices','reviews')
            ->loadCount('reviews')
            ->loadSum('reviews', 'rating');

        return view('livewire.popular-property', [
            'liked' => $isLiked,
            'property' => $this->property
        ]);
    }
}
