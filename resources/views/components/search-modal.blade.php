<div x-show="isOpen" @click.away="isOpen = false"
    class="absolute top-[70px] mt-2 max-w-xl bg-gray-50 shadow-xl rounded-xl border border-gray-200 z-50" >
    {{ $slot }}
</div>
