@props(['review'])
<div class="p-10">
    <div class="flex gap-2 ">
        <div>
            <img src="https://www.gravatar.com/avatar/2c7d99fe281ecd3bcd65ab915bac6dd5?s=250" height="48" width="48" alt="profile">
        </div>
        <div>
            <h3>{{$review->user->name}}</h3>
            <div>{{$review->user->city}}</div>
        </div>
    </div>
    <div class="flex gap-3">
        <div class="flex mt-1">
            <x-icons.stars :stars_count="$review->rating"/>
        </div>
        <div class="font-semibold">
            {{$review->date}}
        </div>
        <div class="text-gray-500">
            almost a weak
        </div>
    </div>
    <span>{{$review->comment}}</span>
</div>
