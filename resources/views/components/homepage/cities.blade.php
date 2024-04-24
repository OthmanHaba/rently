
@props(['cities'])
{{--
<div class="lg:p-20 pt-2 sm:p-14 items-center mt-2 ">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- cards -->
        <div class="relative overflow-hidden bg-gray-300 rounded-lg w-full h-96 m-2">
            <img class="w-full h-48 object-cover" src="/images/image.png" alt="Destination 1">
            <div class="absolute bottom-0 left-0 p-4">
                <h3 class="text-white text-lg font-semibold">{{$cities[0]->name}}</h3>
            </div>
        </div>

        <div class="relative overflow-hidden bg-white rounded-lg w-full h-96 m-2">
            <div class="relative w-full h-3/5 rounded-lg">
                <img class="w-full h-full object-cover" src="/images/image.png" alt="Destination 1">
                <div class="absolute bottom-0 left-0 p-4">
                    <h3 class="text-white text-lg font-semibold">{{$cities[1]->name}}</h3>
                </div>
            </div>
            <div class="relative w-full h-2/5 mt-4 rounded-lg ">
                <img class="w-full h-full object-cover" src="/images/image.png" alt="Destination 1">
                <div class="absolute bottom-0 left-0 p-4">
                    <h3 class="text-white text-lg font-semibold">{{$cities[2]->name}}</h3>
                </div>
            </div>
        </div>

        <div class="relative overflow-hidden bg-gray-300 rounded-lg w-full h-96 m-2">
            <img class="w-full h-48 object-cover" src="/images/image.png" alt="Destination 1">
            <div class="absolute bottom-0 left-0 p-4">
                <h3 class="text-white text-lg font-semibold">{{$cities[3]->name}}</h3>
            </div>
        </div>

        <div class="relative overflow-hidden bg-white rounded-lg w-full h-96 m-2">
            <div class="relative w-full h-2/5 rounded-lg">
                <img class="relative w-full h-full object-cover" src="/images/image.png" alt="Destination 1">
                <div class="absolute bottom-0 left-0 p-4">
                    <h3 class="text-white text-lg font-semibold">{{$cities[4]->name}}</h3>
                </div>
            </div>
            <div class="relative w-full h-3/5 mt-4 rounded-lg">
                <img class="w-full h-full object-cover" src="/images/image.png" alt="Destination 1">
                <div class="absolute bottom-0 left-0 p-4">
                    <h3 class="text-white text-lg font-semibold">{{$cities[5]->name}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>

--}}
@php
    $images = collect([
        'bangazy.jpg',
        'triboly.jpg',
        'sabha252.jpg',
        'misrath.jpg',
]);
        $count = 0
 @endphp
<div class="container mx-auto py-12">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach($cities as $city)
            <div class="relative overflow-hidden bg-gradient-to-r from-blue-400 to-blue-600 rounded-lg shadow-lg transition duration-300 transform hover:scale-105 hover:shadow-xl">
                <img class="w-full h-60 object-cover rounded-t-lg" src="/images/{{$images[$count++]}}" alt="{{ $city->name }}">
                <div class="absolute inset-0 flex items-center justify-center text-white bg-black bg-opacity-40 opacity-0 transition duration-300 hover:opacity-100 rounded-lg">
                    <h3 class="text-xl font-semibold">{{ $city->name }}</h3>
                </div>
{{--                <a href="{{ route('city.show', $city->id) }}" class="absolute inset-0"></a>--}}
            </div>
        @endforeach
    </div>
</div>





