@props(['categoryName'])
<div class="relative w-48  rounded-3xl overflow-hidden shadow-2xl">
    <img class="absolute inset-0 w-full h-full object-cover blur-sm" src="/images/image.png" alt="">
    <div class="absolute inset-0 bg-black bg-opacity-25"></div>
    <div class="flex items-center justify-center h-full">
        <h4 class="text-white font-bold z-10">{{$categoryName}}</h4>
    </div>
</div>
