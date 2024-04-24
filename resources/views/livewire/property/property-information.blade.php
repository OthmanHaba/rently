<div>
    <div class="px-4 py-8 bg-white grid grid-cols-2 gap-4">
        <div class="flex flex-col md:col-span-2">
            <div class="w-full py-2">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                <div class="flex">
                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 25 25">
                        <path d="M21,2H3A1,1,0,0,0,2,3V21a1,1,0,0,0,1,1H21a1,1,0,0,0,1-1V3A1,1,0,0,0,21,2ZM4,4H20V6H4ZM20,20H4V8H20ZM6,12a1,1,0,0,1,1-1H17a1,1,0,0,1,0,2H7A1,1,0,0,1,6,12Zm0,4a1,1,0,0,1,1-1h5a1,1,0,0,1,0,2H7A1,1,0,0,1,6,16Z" />
                    </svg>
                    </span>
                    <input wire:model.lazy="title" value="{{$title}}" type="text" name="title" id="title" placeholder="Title" class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                </div>
                @error('title') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
            </div>
            <div class="w-full py-2">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                <div class="flex">
                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 25 25">
                        <path xmlns="http://www.w3.org/2000/svg" d="M12,2C6.5,2,2,6.5,2,12s4.5,10,10,10s10-4.5,10-10v-1c-0.6,0.9-1.2,1.7-1.7,2.4c-0.4,2.2-1.6,4.1-3.3,5.4  c-0.1-0.3-0.2-0.7-0.3-1c-0.1-0.4-0.2-0.8-0.4-1.2c-0.1-0.4-0.2-0.8-0.4-1.1c-0.1-0.1-0.3-0.2-0.5-0.3c-0.7-0.2-1.6,0.1-2.1-0.6  c-0.2-0.3-0.2-0.6-0.1-1c0.2-0.3,0.3-0.6,0.5-0.9c0.2-0.4,0.5-0.9,0.6-1.4c-0.8-1.2-1.6-2.6-2-3.9h-0.1c-0.1,0-0.1,0-0.2-0.1  c-0.2-0.2-0.3-0.7-0.2-1c0-0.5,0.3-0.8,0.2-1.3c0-0.1-0.1-0.9-0.1-0.9c-0.3,0-0.8,0-0.7-0.5V3.5H12h0.5c0.2-0.6,0.6-1.1,0.9-1.5H12z   M18,2c-2.2,0-4,1.8-4,4s4,7,4,7s4-4.8,4-7S20.2,2,18,2z M18,4.5c0.8,0,1.5,0.7,1.5,1.5S18.8,7.5,18,7.5S16.5,6.8,16.5,6  S17.2,4.5,18,4.5z M8,5.1c0.4,0,0.7,0,1,0.1s0.6,0.3,0.8,0.5s0.5,0.5,0.5,0.8c0,0.1,0,0.2-0.1,0.2C10.1,6.8,10,6.8,9.9,6.8  c-0.3,0-0.6,0-0.8-0.1C9,6.6,8.8,6.4,8.6,6.3C8.1,6.1,7.2,7.4,7.1,7.8C7,8.1,7,8.8,7.5,8.9c0.3,0,1-0.6,1.2-0.8C8.9,8,9,7.9,9.2,7.8  c0.8-0.1,1.4,0.6,1.6,1.3C11,9.9,9.6,10.5,9,10.7c-0.2,0.1-0.3-0.1-0.5,0c-0.5,0.2-1.1,0.9-1.1,1.4s-0.1,1-0.2,1.5  c-0.1,0-0.2-0.1-0.2-0.1v-0.2c0-0.3-0.1-0.6-0.4-0.8c-0.1,0-0.1-0.1-0.2-0.1c-0.3-0.1-0.6-0.4-0.9-0.1c-0.2,0.2-0.4,0.5-0.4,0.8  c0,0.1,0,0.2,0.1,0.3c0.2,0.1,0.4,0,0.6,0c0.1,0,0.2,0.2,0.3,0.3c0.2,0.3,0.3,0.8,0.7,0.8h0.7h1.3c0.3,0.1,0.8,0.2,1,0.4  c0.1,0.2,0.1,0.4,0.2,0.6c0.4,0.5,1.1,0.5,1.7,0.7c0.2,0.1,0.3,0.2,0.3,0.4c0,0.3-0.1,0.7-0.2,1s-0.2,0.7-0.4,0.9s-0.4,0.3-0.6,0.4  c-0.4,0.2-0.6,0.6-0.8,0.9c0,0-0.1,0.2-0.2,0.3c-0.8-0.2-1.5-0.5-2.2-1v-0.2c-0.1-0.4-0.2-0.7-0.3-1c-0.2-0.5-0.5-1.1-0.6-1.6  c0-0.5,0.1-1-0.2-1.4c-0.3-0.5-1.1-0.5-1.6-0.8c-0.4-0.4-0.9-0.8-1.3-1.3V12c0-2.7,1.3-5.1,3.3-6.7C7.3,5.2,7.6,5.1,8,5.1z"/>                    </svg>
                    </span>
                    <input  wire:model.lazy="address" value="{{$address}}" type="text" name="address" id="address" placeholder="Address" class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                </div>
                @error('address') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-span-2">
            <div class="w-full py-2">
                <label class=" flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-8 opacity-70"><path d="M21,2H3A1,1,0,0,0,2,3V21a1,1,0,0,0,1,1H21a1,1,0,0,0,1-1V3A1,1,0,0,0,21,2ZM4,4H20V6H4ZM20,20H4V8H20ZM6,12a1,1,0,0,1,1-1H17a1,1,0,0,1,0,2H7A1,1,0,0,1,6,12Zm0,4a1,1,0,0,1,1-1h5a1,1,0,0,1,0,2H7A1,1,0,0,1,6,16Z" /></svg>
                    <textarea wire:model.lazy="description" name="description" id="description" value="{{$description}}" class="textarea textarea-info textarea-xs w-full max-w-xs max-h-4 " placeholder="Description"></textarea>
                    @error('description') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                </label>
            </div>
            <div class="w-full py-2">
                <label class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-8 opacity-70"><path d="M21,2H3A1,1,0,0,0,2,3V21a1,1,0,0,0,1,1H21a1,1,0,0,0,1-1V3A1,1,0,0,0,21,2ZM4,4H20V6H4ZM20,20H4V8H20ZM6,12a1,1,0,0,1,1-1H17a1,1,0,0,1,0,2H7A1,1,0,0,1,6,12Zm0,4a1,1,0,0,1,1-1h5a1,1,0,0,1,0,2H7A1,1,0,0,1,6,16Z" /></svg>
                    <textarea wire:model.lazy="longDescription" name="description" id="description" value="{{$longDescription}}" class="textarea textarea-info grow" placeholder="longDescription"></textarea>
                    @error('longDescription') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
                </label>
            </div>
            <div class="w-full py-2 flex justify-center">
                <div class="relative flex items-center max-w-[11rem]">
                    <button type="button" id="decrement-button" data-input-counter-decrement="numberOfRooms" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                        </svg>
                    </button>
                    <input wire:model.lazy="numberOfRooms" type="text" value="{{$numberOfRooms}}" name="numberOfRooms" id="numberOfRooms" data-input-counter data-input-counter-min="1" data-input-counter-max="8" aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-11 font-medium text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full pb-6 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    <div class="absolute bottom-1 start-1/2 -translate-x-1/2 rtl:translate-x-1/2 flex items-center text-xs text-gray-400 space-x-1 rtl:space-x-reverse">
                        <svg class="w-2.5 h-2.5 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8v10a1 1 0 0 0 1 1h4v-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v5h4a1 1 0 0 0 1-1V8M1 10l9-9 9 9"/>
                        </svg>
                        <span>Rooms</span>
                    </div>
                    <button type="button" id="increment-button" data-input-counter-increment="numberOfRooms" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                        </svg>
                    </button>
                </div>
            </div>
            @error('numberOfRooms') <span class="text-xs text-red-500 mt-1">{{ $message }}</span> @enderror
        </div>
    </div>
</div>
