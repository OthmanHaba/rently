@props(['property'])
@php
    $rate = $property->reviews_count > 0
    ? number_format($property->reviews_sum_rating / $property->reviews_count, 2)
    : 0.00;
@endphp
<div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden shadow-lg">
    <img class="w-full h-56 object-cover" src="/images/property/photo_{{random_int(1,95)}}_2024-02-23_12-10-19.jpg" alt="Apartment Image">
    <div class="p-4">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" viewBox="0 0 20 20"
                 fill="currentColor">
                <path fill-rule="evenodd"
                      d="M17.707 7.293a1 1 0 0 1 0 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4a1 1 0 1 1 1.414-1.414L11 9.586V4a1 1 0 1 1 2 0v5.586l2.293-2.293a1 1 0 0 1 1.414 0z"
                      clip-rule="evenodd"/>
            </svg>
            <p class="text-sm text-gray-600 ml-1">{{$rate}}</p>
        </div>
        <div class="mt-4">
            <p class="text-lg font-semibold text-gray-800">{{$property->title}}</p>
            <p class="text-sm text-gray-600 mt-2">Entire apartment &#183; 2 guests &#183; 1 bedroom &#183; 1 bed &#183;
                1 bath</p>{{--make it in the database othman--}}
        </div>
        <div class="mt-4">
            <p class="text-xs text-gray-500">Cancellation flexibility available</p>{{--cancaletion--}}
            <p class="text-xs text-gray-500">Superhost</p>
        </div>
        <div class="mt-4">
            <p class="text-lg text-gray-800">{{$property->prices[0]->pricePerNight}} / night</p>
        </div>
        <div class="flex justify-between items-center mt-4">
            <div>
                <a
                    class="cursor-pointer bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg focus:outline-none"
                    href="{{route('property.show',$property)}}"
                >Book Now</a>
            </div>
            <div>
                <button
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold px-4 py-2 rounded-lg focus:outline-none">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>
