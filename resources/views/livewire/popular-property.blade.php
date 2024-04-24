{{--
<div class="max-w-[250px] h-[295px] mx-auto bg-white shadow-md rounded-[24px] overflow-hidden">
    <!-- Image Section -->
    <div class="relative h-2/3 p-1">
                <span @php  $review = $property->reviews_count > 0
                        ? number_format($property->reviews_sum_rating / $property->reviews_count, 2)
                            : 0.00;  @endphp
                    class="my-2 mx-2.5 w-12 absolute top-0 left-0 bg-[#eb0200] text-[#ffffff] px-2 py-1 rounded-full text-center">{{$review}}</span>
        <button wire:click="like({{$property->id}})"
            class="m-2 cursor-pointer flex justify-center items-center absolute top-1 right-1 w-6 h-6 border-2 border-solid border-black box-border rounded-full text-red-600 bg-white ">
            <x-icons.like-ico :is-liked="$liked"/>
        </button>
        <img src="/images/image.png" alt="Property Image" class="w-full h-full object-cover rounded-[24px]">
    </div>


    <!-- Property Name -->
    <div class="p-2">
        <h2 class="text-lg text-[16px] ">{{$property->name}}</h2>

        <!-- Location -->
        <p class="text-gray-500 text-sm mb-2.5">{{$property->location->name}}</p>

        <!-- Button Section -->
        <div class="flex justify-between w-full">
            <button
                class="w-full hover:bg-gray-50 text-black px-4  rounded-[24px] flex items-center justify-between">
                {{$property->prices[0]->pricePerNight}}LYD/night
                <img src="/images/svgs/Icon chevron right.svg" alt="icon">
            </button>
        </div>
    </div>
</div>
--}}

@php
    $review = $property->reviews_count > 0
        ? number_format($property->reviews_sum_rating / $property->reviews_count, 2)
        : 0.00;
@endphp

<div class="w-full aspect-w-16 aspect-h-40 md:aspect-w-4 md:aspect-h-10 lg:aspect-w-3 lg:aspect-h-8 xl:aspect-w-4 xl:aspect-h-10 mx-auto">
    <div class="bg-gradient-to-b from-[#3D5A80] via-[#98C1D9] to-[#E0FBFC] shadow-md rounded-lg overflow-hidden transition-transform transform hover:scale-105 aspect-w-16 aspect-h-40 md:aspect-w-4 md:aspect-h-10 lg:aspect-w-3 lg:aspect-h-8 xl:aspect-w-4 xl:aspect-h-10">
        <!-- Image Section -->
        <div class="relative aspect-w-16 aspect-h-20 md:aspect-w-4 md:aspect-h-5 lg:aspect-w-3 lg:aspect-h-6 xl:aspect-w-4 xl:aspect-h-8">
            <span class="absolute top-2 left-2 bg-[#2A4365] text-white px-2 py-1 rounded-full text-center">{{$review}}</span>
            <button wire:click="like({{$property->id}})" class="absolute mt-4 top-2 right-2 transform -translate-y-1/2 w-8 h-8 border-2 border-solid border-[#2A4365] box-border rounded-full text-[#EDF2F4] bg-[#2A4365] flex items-center justify-center">
                <x-icons.like-ico :is-liked="$liked"/>
            </button>
            <div class="aspect-w-16 h-48">
                <img src="/images/property/photo_{{random_int(1,95)}}_2024-02-23_12-10-19.jpg" alt="Property Image" class="inset-0 w-full h-full object-fill rounded-t-lg">
            </div>
        </div>

        <!-- Property Details -->
        <div class="p-4">
            <h2 class="text-2xl font-semibold text-[#1F2937] mb-2 leading-tight">{{$property->name}}</h2>

            <!-- Location -->
            <p class="text-[#4F5D75] text-sm mb-2">{{$property->location->name}}</p>

            <!-- Price and Book Now Button -->
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[#6B7280] text-sm">Starting from</p>
                    <p class="text-lg font-bold text-[#1F2937]">{{$property->prices[0]->pricePerNight}} LYD/night</p>
                </div>
                <a wire:click="bookNow({{$property->id}})" class="text-center w-2/3 py-2 bg-[#EDF2F4] text-[#2A4365] rounded-lg hover:bg-[#A8DADC] focus:outline-none focus:ring focus:border-[#2A4365] transition duration-300 cursor-pointer">
                    <span class="inline-flex items-center">
                        <svg class="w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        Book Now
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>


















