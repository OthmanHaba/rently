<?php

namespace App\Livewire;

use App\Models\Like;
use App\Models\Property;
use Livewire\Component;

class PopularProperties extends Component
{

    public function render()
    {
        $properties =  Property::with(['location', 'prices', 'categories'])
            ->withCount('reviews')
            ->withSum('reviews', 'rating')
            ->orderByDesc('reviews_sum_rating')
            ->orderByDesc('reviews_count')
            ->take(5)->get();
        return view('livewire.popular-properties',[
            'properties' => $properties,
        ]);
    }
}
