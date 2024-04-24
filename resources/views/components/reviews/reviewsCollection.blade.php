@props(['reviews'])
<div class="grid grid-cols-2  w-3/5 mx-52 h-auto ">
    @forelse($reviews->take(5) as $review)
        <x-reviews.review :review="$review"/>
    @empty
        <p>No reviews available.</p>
    @endforelse
</div>
