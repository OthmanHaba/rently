@props(['property'])

<div class="max-w-[250px] h-[295px] mx-auto bg-white shadow-md rounded-[24px] overflow-hidden">
    <!-- Image Section -->
    <div class="relative h-2/3 p-1">
                <span
                    class="my-2 mx-2.5 w-12 absolute top-0 left-0 bg-[#eb0200] text-[#ffffff] px-2 py-1 rounded-full text-center">{{--{{$property->rate}}--}}8.9</span>
        <button
            class="m-2 cursor-pointer flex justify-center items-center absolute top-1 right-1 w-6 h-6 border-2 border-solid border-black box-border rounded-full text-red-600 bg-white ">
            <x-icons.like-ico :is-liked="false"/>
            {{--<svg style="color: #eb0200; fill: #000000; width: 14px; height: 14px; font-size: 14px;"
                 viewBox="0 0 512 512">
                <path
                    d="M0 190.9V185.1C0 115.2 50.52 55.58 119.4 44.1C164.1 36.51 211.4 51.37 244 84.02L256 96L267.1 84.02C300.6 51.37 347 36.51 392.6 44.1C461.5 55.58 512 115.2 512 185.1V190.9C512 232.4 494.8 272.1 464.4 300.4L283.7 469.1C276.2 476.1 266.3 480 256 480C245.7 480 235.8 476.1 228.3 469.1L47.59 300.4C17.23 272.1 .0003 232.4 .0003 190.9L0 190.9z"></path>
            </svg>--}}
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
                {{--{{$property->price}}--}}230$/night
                <img src="/images/svgs/Icon chevron right.svg" alt="icon">
            </button>
        </div>
    </div>
</div>
