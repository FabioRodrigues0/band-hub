@props(['album'])

@php
    $slug = is_array($album) ? ($album['slug'] ?? null) : ($album->slug ?? null);
@endphp

@if($slug)
    <a href="{{ route('albums.show', ['slug' => $slug]) }}" class="block">
@else
    <div class="block">
@endif
    <div class="bg-gray-900/40 rounded-md overflow-hidden hover:bg-gray-800/40 transition-all group">
        {{-- Image container --}}
        <div class="aspect-square">
            <img src="{{ is_array($album) ? ($album['image'] ?? '') : ($album->image ?? '') }}" 
                alt="{{ is_array($album) ? ($album['name'] ?? '') : ($album->name ?? '') }}" 
                class="w-full h-full object-cover"
            >
        </div>

        {{-- Content --}}
        <div class="p-3">
            <h3 class="font-bold text-base-100 truncate text-sm">
                {{ is_array($album) ? ($album['name'] ?? '') : ($album->name ?? '') }}
            </h3>
            <p class="text-xs text-base-300 mt-1">
                {{ is_array($album) ? ($album['artists'][0]['name'] ?? '') : ($album->artists->first()->name ?? '') }}
            </p>
        </div>
    </div>
@if($slug)
    </a>
@else
    </div>
@endif
