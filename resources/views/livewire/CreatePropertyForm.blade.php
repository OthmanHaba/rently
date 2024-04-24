<div>
    <p class="font-bold m-12">Please Provide Details About Your Property</p>
    <div class="text-center">
        <ul class="steps justify-center">
            @switch($currentPage)
                @case(1)
                    <li class="step step-info">Property Information</li>
                    <li class="step">Property Location</li>
                    <li class="step">Property Addon</li>
                    <li class="step">Room Preferences</li>
                    <li class="step">Payment</li>
                    @break
                @case(2)
                    <li class="step step-info">Property Information</li>
                    <li class="step step-info">Property Location</li>
                    <li class="step">Property Addon</li>
                    <li class="step">Room Preferences</li>
                    <li class="step">Payment</li>
                    @break
                @case(3)
                    <li class="step step-info">Property Information</li>
                    <li class="step step-info">Property Location</li>
                    <li class="step step-info">Property Addon</li>
                    <li class="step">Room Preferences</li>
                    <li class="step">Payment</li>
                    @break
                @case(4)
                    <li class="step step-info">Property Information</li>
                    <li class="step step-info">Property Location</li>
                    <li class="step step-info">Property Addon</li>
                    <li class="step step-info">Room Preferences</li>
                    <li class="step">Payment</li>
                    @break
               @case(5)
                    <li class="step step-info">Property Information</li>
                    <li class="step step-info">Property Location</li>
                    <li class="step step-info">Property Addon</li>
                    <li class="step step-info">Room Preferences</li>
                    <li class="step step-info">Payment</li>
                    @break
            @endswitch
            <li class="step step-info"></li>
        </ul>
    </div>
    <div>
        <div class="py-12">
            <div class="max-w-7xl mx-10 sm:px-6 lg:px-8">
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-12">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">{{ $pages[$currentPage]['heading'] }}</h3>
                                <p class="mt-1 text-sm text-gray-600">{{ $pages[$currentPage]['subheading'] }}</p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2 w-full">
                            @if ($errors->isNotEmpty())
                                <div class="text-sm bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                                    <strong class="font-bold">Oops!</strong>
                                    <span class="block sm:inline">There are some errors with your submission.</span>
                                </div>
                            @endif
                            @if ($success)
                                <div class="text-sm bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                                    <span class="block sm:inline">{{ $success }}</span>
                                    <span wire:click="resetSuccess" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                                </span>
                                </div>
                            @endif
                            <form wire:submit.prevent="submit">
                                <div class="shadow overflow-hidden sm:rounded-md">
                                        @if ($currentPage === 1)
                                            @if ($errors->isNotEmpty())
                                                @livewire('property.property-information',['title'=>$title,'address' => $address,'description'=>$description,'numberOfRooms'=>$numberOfRooms,'longDescription'=>$longDescription])
                                            @else
                                                @livewire('property.property-information',['$errors'=> $errors,'title'=>$title,'address' => $address,'description'=>$description,'numberOfRooms'=>$numberOfRooms,'longDescription'=>$longDescription])
                                           @endif
                                        @elseif ($currentPage === 2)
                                            @if ($errors->isNotEmpty())
                                                @livewire('property.property-location')
                                            @else
                                                @livewire('property.property-location',['$errors'=> $errors])
                                            @endif
                                        @elseif ($currentPage === 3)
                                            @if ($errors->isNotEmpty())
                                                @livewire('property.property-addon')
                                            @else
                                                @livewire('property.property-addon',['$errors'=> $errors])
                                            @endif
                                        @elseif ($currentPage === 4)
                                            @if ($errors->isNotEmpty())
                                                @livewire('property.room-preferences',['Guests' => $Guests])
                                            @else
                                                @livewire('property.room-preferences',['$errors'=> $errors,'Guests' => $Guests])
                                            @endif
                                        @elseif ($currentPage === 5)
                                            @if ($errors->isNotEmpty())
                                                @livewire('property.payment')
                                            @else
                                                @livewire('property.payment',['$errors'=> $errors])
                                            @endif
                                        @endif
                                    <div class="flex items-center justify-between px-4 py-3 bg-gray-50 text-right sm:px-6">
                                            @if ($currentPage === 1)
                                                <div></div>
                                            @else
                                                <button wire:click="goToPreviousPage" type="button" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-400 hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-400">
                                                    Back
                                                </button>
                                            @endif
                                            @if ($currentPage === count($pages))
                                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Submit
                                                </button>
                                            @else
                                                <button wire:click="goToNextPage" type="button" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-info hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Next
                                                </button>
                                            @endif
                                            </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
