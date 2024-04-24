<div class="px-16 flex gap-4 mb-10">
    @foreach($properties as $property)
        <livewire:popular-property :property="$property" :user_id="auth()->user()->id" :key="$property->id"/>
    @endforeach
</div>
