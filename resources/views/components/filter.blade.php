<div x-data="modalComponent"
     class="border border-white rounded-full  mx-auto px-8">
    <div class="flex flex-row items-center text-white  absolute top-72 left-0 px-20 border-white ">
        <div class="flex bg-white rounded-full text-gray-700">
            <div>
                <button @click="if(isCalenderOpen){isCalenderOpen = false};isOpen = !isOpen"
                        class="flex-1 px-4 py-2 rounded-full  "
                        :class="isOpen ? 'bg-gray-400' : ''">
                    <div class="font-semibold px-0">Location</div>
                    <div class="text-sm text-gray-500 px-2" x-text="location">Where to go?</div>
                </button>
            </div>
            <div class="divider divider-horizontal my-2"></div>
            <div>
                <button @click="if(isOpen){isOpen = false}; isCalenderOpen = ! isCalenderOpen "
                        class="flex-1 px-4 py-2  rounded-full ">
                    <div class="font-semibold">Check-in</div>
                    <div
                        x-on:date-range-selected.window="startDate = $event.detail.startDate; endDate = $event.detail.endDate;"
                        x-on:dates-reset.window="resetDates"
                        class="text-sm text-gray-500" x-text="startDate">Select date
                    </div>
                </button>
            </div>
            <div class="divider divider-horizontal my-2"></div>
            <div>
                <button class="flex-1 px-4 py-2  rounded-full ">
                    <div class="font-semibold">Check-out</div>
                    <div class="text-sm text-gray-500" x-text="endDate ? endDate : 'Check-out'">Select date</div>
                </button>
            </div>
            <div class="divider divider-horizontal my-2"></div>
            <button
                @click="if(isCalenderOpen){isCalenderOpen = false}; isGuest = !isGuest"
                class="flex-1 px-4 py-2  rounded-full">
                <div class="font-semibold">Guests</div>
                <div class="text-sm text-gray-500">Number of guests</div>
            </button>
            <div class="divider divider-horizontal my-2"></div>
            <div class="flex items-center">
                <a href="{{route('property.index')}}" class="bg-white  rounded-r-full hover:bg-gray-200 focus:outline-none focus:shadow-outline-blue">
                    <div class="">
                        <svg class="text-blue-500 w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 12h14M12 5l7 7-7 7">
                            </path>
                        </svg>
                    </div>
                </a>
            </div>
        </div>

        <x-search-modal>
            <div class="grid grid-cols-2 gap-5 p-5">
                <div class="col-span-2">
                    <div class="grid grid-cols-2 gap-5">
                        <button
                            @click="location = 'Tripoli'"
                            class="max-w-xs rounded-lg overflow-hidden shadow-lg transition transform hover:scale-105 hover:bg-gray-100">
                            <img class="w-full rounded-t-lg"
                                 src="/images/triboly.jpg" alt="Tripoli">
                            <div class="px-6 py-4">
                                <div class="font-semibold text-xl mb-2 text-left text-gray-800">Tripoli</div>
                            </div>
                        </button>
                        <button
                            @click="location = 'Bangazy'"
                            class="max-w-xs rounded-lg overflow-hidden shadow-lg transition transform hover:scale-105 hover:bg-gray-100">
                            <img class="w-full rounded-t-lg"
                                 src="/images/bangazy.jpg" alt="Tripoli">
                            <div class="px-6 py-4">
                                <div class="font-semibold text-xl mb-2 text-left text-gray-800">Bangazy</div>
                            </div>
                        </button>
                        <button
                            @click="location = 'misrath'"
                            class="max-w-xs rounded-lg overflow-hidden shadow-lg transition transform hover:scale-105 hover:bg-gray-100">
                            <img class="w-full rounded-t-lg"
                                 src="/images/misrath.jpg" alt="Tripoli">
                            <div class="px-6 py-4">
                                <div class="font-semibold text-xl mb-2 text-left text-gray-800">misrath</div>
                            </div>
                        </button>
                        <button
                            @click="location = 'sabha'"
                            class="max-w-xs rounded-lg overflow-hidden shadow-lg transition transform hover:scale-105 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            <img class="w-full rounded-t-lg"
                                 src="/images/sabha252.jpg" alt="Tripoli">
                            <div class="px-6 py-4">
                                <div class="font-semibold text-xl mb-2 text-left text-gray-800">sabha</div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </x-search-modal>
        <div
            class="absolute top-[70px] mt-2 max-w-xl bg-white shadow-xl rounded-xl border border-gray-200 z-50 p-4 right-[80px]"
            x-show="isCalenderOpen">
            @livewire('date-range', ['dayClass' => 'text-gray-700'])

        </div>
        <div
            class="absolute top-[70px] mt-2 max-w-xl bg-white shadow-xl rounded-xl border border-gray-200 z-50 p-4 right-[80px]"
            x-show="isGuest">
            <div x-data="{ adults: 1, children: 0, infants: 0 }">
                <!-- Guest Selector -->
                <div class="bg-white rounded shadow p-4">
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-lg text-black font-semibold">Guests</span>
                    </div>

                    <!-- Adults -->
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-gray-600">Adults</span>
                        <div class="flex items-center space-x-4">
                            <button @click="adults > 0 ? adults-- : 0" class="text-gray-400">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M20 12H4"></path>
                                </svg>
                            </button>
                            <span class="text-black" x-text="adults"></span>
                            <button @click="adults++" class="text-blue-500">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Children -->
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-gray-600">Children</span>
                        <div class="flex items-center space-x-4">
                            <button @click="children > 0 ? children-- : 0" class="text-gray-400">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M20 12H4"></path>
                                </svg>
                            </button>
                            <span class="text-black" x-text="children"></span>
                            <button @click="children++" class="text-blue-500">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Infants -->
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Infants</span>
                        <div class="flex items-center space-x-4">
                            <button @click="infants > 0 ? infants-- : 0" class="text-gray-400">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M20 12H4"></path>
                                </svg>
                            </button>
                            <span class="text-black" x-text="infants"></span>
                            <button @click="infants++" class="text-blue-500">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <script>
            function modalComponent() {
                return {
                    isOpen: false,
                    isCalenderOpen: false,
                    isGuest: false,
                    startDate: 'Not selected',
                    endDate: 'Not selected',
                    location: 'where to go',

                    resetDates() {
                        this.startDate = 'Not selected';
                        this.endDate = 'Not selected';
                    },
                };
            }
        </script>
    </div>
</div>
