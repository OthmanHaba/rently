<x-app-layout>
    @php
        $properties_ = [
            'property' => [
                'location' => '123 Main Street, Cityville',
                'view' => 'Cityscape',
                'available' => 'Now',
                'price' => '$1,500 per month',
                'rating' => '4.5 stars',
            ],
        ];
    @endphp

{{--    <x-category.category-cards :categories="$categories"/>--}}

    <x-property.explore-cards :properties="$properties"/>

</x-app-layout>
