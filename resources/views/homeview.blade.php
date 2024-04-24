<x-app-layout>
    <x-slot name="header">
        <div class="relative bg-white rounded-3xl ">
            <img class="w-full h-full" src="/images/ma.png" alt="home image">
            <h1 class="absolute top-1/3 -translate-x-1 text-center text-5xl text-[#03618A] font-bold px-20 font-montserrat">
                Find your perfect stay
            </h1>
        </div>
    </x-slot>

    <x-filter/>


    <div class="text-6xl mt-16 px-8 lg:px-24 font-extrabold text-center text-gray-900">
        <h2 class="uppercase tracking-widest leading-snug mb-4 text-blue-500">Discover Your Dream Destinations</h2>
        <div class="h-2 w-24 bg-blue-500 mx-auto mb-6"></div>
        <p class="max-w-2xl mx-auto text-lg text-gray-700 leading-relaxed">Embark on extraordinary journeys and create lasting memories in the most enchanting places around the globe.</p>
        <a href="#" class="inline-block mt-8 px-8 py-3 text-lg font-semibold bg-gradient-to-r from-blue-400 to-blue-600 text-white rounded-full shadow-lg hover:from-blue-500 hover:to-blue-700 transform hover:scale-105 transition duration-300 ease-in-out">Explore Now</a>
    </div>

    <div class="text-3xl mt-8 px-4 lg:px-16 font-bold text-center text-gray-800 ">
        <h2 class="uppercase tracking-wide">Popular Destinations</h2>
        <div class="h-1 w-12 bg-indigo-500 mx-auto mt-2"></div>
    </div>

    <x-homepage.cities :cities="$cities->take(4)"/>

    <div class="mt-8 px-8 lg:px-20">
        <h2 class="text-4xl font-extrabold text-center text-gray-900 mb-6 uppercase tracking-wider">Discover Popular Homes</h2>
        <div class="h-1 w-16 bg-blue-500 mx-auto mb-8"></div>
    </div>


    @livewire('popular-properties')

</x-app-layout>
