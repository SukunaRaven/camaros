@props([
    'active'
])

<a {{$attributes}} class="text-red-500 hover:underline @if($active) bg-gray-800 @endif">{{ $slot }}</a>
