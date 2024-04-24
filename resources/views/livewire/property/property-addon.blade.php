<div class="grid grid-cols-4 gap-4 p-4">
    @foreach($categories as $category)
        <label class="inline-flex items-center cursor-pointer p-2">
            <input wire:key="{{ $category->name }}" wire:model="selectedValues" name="{{$category->name}}" type="checkbox" value="{{$category->id}}" class="sr-only peer">
            <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{$category->name}}</span>
        </label>
    @endforeach


</div>
