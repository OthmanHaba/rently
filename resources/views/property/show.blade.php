<x-app-layout>
    @php
        $images = collect([
            "/images/property/photo_" . random_int(1,95) . "_2024-02-23_12-10-19.jpg",
            "/images/property/photo_" . random_int(1,95) . "_2024-02-23_12-10-19.jpg",
            "/images/property/photo_" . random_int(1,95) . "_2024-02-23_12-10-19.jpg",
            "/images/property/photo_" . random_int(1,95) . "_2024-02-23_12-10-19.jpg",
            "/images/property/photo_" . random_int(1,95) . "_2024-02-23_12-10-19.jpg",
            "/images/property/photo_" . random_int(1,95) . "_2024-02-23_12-10-19.jpg",
        ]);
    @endphp
    <section>
        <div
            class="relative grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8 px-4 sm:px-6 lg:px-8 mx-auto sm:mx-32 lg:mx-64 max-w-screen-2xl">

            <div class="col-span-1 lg:col-span-2 row-span-2 rounded-xl overflow-hidden relative">
                <img
                    class="object-cover w-full h-full absolute inset-0 lazyload shadow-md"
                    src="{{ $images[0] }}"
                    alt="Hero image"
                />

                <button
                    class="m-4 absolute bottom-0 right-0 py-2 px-4 z-10 bg-gray-300
                     border border-black hover:bg-blue-200 hover:text-blue-600 rounded-lg
                    focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 text-center">
                    Show all images
                </button>
            </div>

            @foreach ($images->skip(1) as $image)
                <div
                    class="col-span-1 rounded-xl overflow-hidden h-[150px] sm:h-[175px] md:h-[200px] lg:h-[225px] cursor-pointer hover:opacity-80 hover:shadow-md transition ease-in-out duration-200">
                    <img
                        class="object-cover w-full h-full lazyload"
                        src="{{ $image }}"
                        alt="Thumbnail image"
                        onclick="openLightboxImage('{{ $image }}')"/>
                </div>
            @endforeach

        </div>
    </section>

    <section>
        <div class=" flex justify-between mx-auto sm:mx-[32px] md:mx-[64px] mt-10 lg:mx-64">
            <div class="flex flex-col  justify-center">
                <h3 class="text-[24px]">{{$property->title}}</h3>{{--Amazing home--}}
                <p class="text-[14px]">{{$property->description}}</p>{{--A 5 star hotel with 5 bedrooms and amizang view on it --}}
            </div>
            @php
                $review = $property->reviews_count > 0
                        ? number_format($property->reviews_sum_rating / $property->reviews_count, 2)
                            : 0.00;
                $review_status = '';

                if ($review >= 4.5) {
                    $review_status = 'Excellent';
                } elseif ($review >= 3.5 && $review < 4.5) {
                    $review_status = 'Good';
                } elseif ($review >= 2.5 && $review < 3.5) {
                    $review_status = 'Average';
                } elseif ($review >= 1.5 && $review < 2.5) {
                    $review_status = 'Poor';
                } else {
                    $review_status = 'Unknown';
                }

            @endphp
            <div class="flex flex-row items-center gap-1">
                <div class="text-xs">
                    <p>{{$review_status}}</p>
                    <p>{{$property->reviews_count}} Reviews</p>
                </div>
                <div
                    class="flex bg-[#e31459] text-center text-white rounded w-[60px] h-[32px] items-center justify-center">
                    {{$review}} ⭐
                </div>
            </div>
        </div>
    </section>

    {{--taps for property information --}}
    <section>
        <div x-data="{ currentTab: 1 }" class="p-2 bg-white mt-4 lg:mx-64">
            <ul class="flex gap-4 p-4 pb-px border-b ml-4">
                <li @click="currentTab = 1"
                    class="bg-white hover:border-b-2 pb-3"
                    :class="(currentTab === 1) ? 'border-b-2 border-b-amber-800': '' ">
                    <button href="#">Property overview</button>
                </li>
                <li @click="currentTab = 2"
                    class="bg-white hover:border-b-2 pb-3"
                    :class="(currentTab === 2) ? 'border-b-2 border-b-amber-800': '' ">
                    <button href="#">Property add-ons</button>
                </li>
                <li @click="currentTab = 3"
                    class="bg-white hover:border-b-2 pb-3"
                    :class="(currentTab === 3) ? 'border-b-2 border-b-amber-800': '' ">
                    <button href="#">Property policies</button>
                </li>
            </ul>

            <div class="p-8 pt-2">
                <div x-show="currentTab === 1">
                    <p><strong class="font-bold text-lg">where to find it?</strong></p>
                    <p>{{$property->address}}</p>
                    <p><strong class="font-bold text-lg">about my property</strong></p>
                    <p>{{$property->longDescription}}</p>
                </div>
                <div x-show="currentTab === 2">
                    <ul class="list-disc pl-6">

                        @foreach($property->add_ons as $addon)
                            <li class="mb-2">
                                <span class="font-semibold">{{$addon->name}}</span>
                                <span class="text-green-500">{{$addon->availability}}</span>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <div x-show="currentTab === 3">
                    {{--policies--}}
                    <ul class="list-disc pl-6">
                        @foreach($property->policies as $policy)
                            <li class="mb-2">
                                <p>{{$policy->name}}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="flex gap-2 p-8 mx-60">
        @livewire('date-range',['dayClass' => ''])

        <div class="flex flex-col w-96 mx-auto p-8 bg-white rounded-lg shadow-xl">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">{{$property->prices[0]->pricePerNight}} LYD per night</h2>

            <div x-data="selectDates()" x-on:date-range-selected.window="updateTotal">
                <div class="grid grid-cols-2 gap-4 mb-4 border border-gray-200 rounded-lg overflow-hidden">
                    <div class="border-r border-gray-200 px-4 py-2 text-left cursor-pointer">
                        <p class="text-sm font-semibold text-gray-600">Check-in</p>
                        <p class="text-sm text-gray-800" x-text="startDate"></p>
                    </div>
                    <button class="px-4 py-2 text-left cursor-pointer">
                        <p class="text-sm font-semibold text-gray-600">Check-out</p>
                        <p class="text-sm text-gray-800" x-text="endDate"></p>
                    </button>
                </div>

                <button
                    class="flex justify-between items-center border border-gray-200 rounded-lg mb-4 py-2 px-4 text-left hover:bg-gray-50 cursor-pointer">
                    <div>
                        <p class="text-sm font-semibold text-gray-600">GUESTS</p>
                        <span class="text-sm text-gray-800">1 guest</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 9l6 6 6-6"/>
                    </svg>
                </button>

                <a href="/checkout">
                    <button onclick="my_modal_5.showModal()"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition-colors duration-200 ease-in-out">
                        Reserve
                    </button>
                </a>
                {{--                <button class="btn" onclick="my_modal_5.showModal()">open modal</button>--}}
                <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
                    <div class="modal-box">
                        <div role="alert" class="alert alert-success">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>Your purchase has been confirmed!</span>
                        </div>
                        <p class="py-4">Please wait until the host approves the order.</p>
                        <p class="py-1">The host will contact you soon.</p>
                        <div class="modal-action">
                            <form method="dialog">
                                <!-- if there is a button in form, it will close the modal -->
                                <button class="btn">Close</button>
                            </form>
                        </div>
                    </div>

                </dialog>

                <div class="text-xl font-semibold text-gray-900 mt-4" x-text="calculateTotal()">
                </div>
                <span>LYD total per stay </span>
            </div>

            <script>
                function selectDates() {
                    return {
                        startDate: 'Not selected',
                        endDate: 'Not selected',

                        resetDates() {
                            this.startDate = 'Not selected';
                            this.endDate = 'Not selected';
                        },

                        calculateTotal() {
                            if (this.startDate !== 'Not selected' && this.endDate !== 'Not selected') {
                                const start = new Date(this.startDate);
                                const end = new Date(this.endDate);
                                const days = Math.floor((end - start) / (24 * 60 * 60 * 1000));
                                const pricePerNight = {{$property->prices[0]->pricePerNight}};
                                return days * pricePerNight + " LYD";
                            } else {
                                return "Not calculated";
                            }
                        },

                        updateTotal(event) {
                            this.startDate = event.detail.startDate;
                            this.endDate = event.detail.endDate;
                        },
                    };
                }
            </script>
        </div>
    </div>
    <section>
        <x-reviews.reviewsCollection :reviews="$property->reviews"/>
    </section>
    <div class="mx-auto w-2/3 items-center justify-center mt-1">
        <h4 class="mx-2 font-bold text-xl m-4">Where you’ll be</h4>
        @livewire('map',['latitude' =>$property->lat/*32.556325*/ , 'longitude' =>$property->log /*13.109851*/])
    </div>
    <div>
        contact host
    </div>

</x-app-layout>
