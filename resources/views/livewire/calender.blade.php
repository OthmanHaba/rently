<div class="bg-white rounded-lg shadow p-4 max-w-md">
    <div class="flex items-center justify-between mb-4">
        <span class="text-lg font-semibold">{{ now()->month($month)->format('F') }} {{ $year }}</span>
        <div>
            <button class="p-2" wire:click="goToPrevMonth">Prev</button>
            <button class="p-2" wire:click="goToNextMonth">Next</button>
        </div>
    </div>
    <div class="grid grid-cols-7 gap-2">
        @foreach(['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $day)
            <div class="text-sm font-medium text-center">{{ $day }}</div>
        @endforeach
        @for ($i = 0; $i < $firstDayOfWeek; $i++)
            <div class="cursor-pointer py-2 px-4 text-center"></div>
        @endfor

        @for($i = 1; $i <= $daysInMonth; $i++)
            @php
                $currentDayDate = \Carbon\Carbon::createFromDate($year, $month, $i)->toDateString();
                $isSelected = $currentDayDate >= $selectedStartDate && $currentDayDate <= $selectedEndDate;
            @endphp
            <div
                class="cursor-pointer py-2 px-4 text-center rounded-full {{ $isSelected ? 'bg-green-500 text-white' : 'bg-blue-100 text-blue-800' }}"
                wire:click="selectDay({{ $i }})">{{ $i }}</div>
        @endfor

    </div>
    @if($selectedStartDate && $selectedEndDate)
        <div class="mt-4 text-center">
            Total Days: {{ $this->getTotalDaysAttribute() }}
        </div>
    @endif

</div>
