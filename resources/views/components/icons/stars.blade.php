@props(['stars_count' => 4])

@for($i = 0; $i < 5; $i++)
    <x-icons.star :filled="$i < $stars_count"/>
@endfor
