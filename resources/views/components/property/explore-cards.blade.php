@props(['properties'])
<div class="p-5 grid grid-cols-4 gap-4">
    @foreach($properties as $property)
        <x-property.explore-card :property="$property"/>
    @endforeach
</div>
