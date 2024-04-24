@props(['categories'])

<div class="container mx-auto px-4 py-6 cursor-pointer">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 shadow-xl">
        @foreach($categories as $category)
            <div class="relative rounded-lg overflow-hidden shadow-md group bg-white hover:shadow-2xl transition duration-300">
                <div class="relative">
                    <div class="absolute inset-0 bg-black opacity-30 rounded-lg shadow-2xl"></div>
                    <div class="relative">
                        <img class="w-full h-32 object-cover backdrop-blur" src="https://picsum.photos/400/200" alt="Category Image">
                        <div class="absolute inset-0 rounded-lg shadow-inner"></div>
                    </div>
                </div>

                <div class="absolute inset-0 flex items-center justify-center">
                    <h4 class="text-white text-2xl font-bold bg-black bg-opacity-40 p-4 rounded">{{ $category->name }}</h4>
                </div>
            </div>
        @endforeach
    </div>
</div>





