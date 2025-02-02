@props(['artist'])

@php
    $slug = is_array($artist) ? ($artist['slug'] ?? null) : ($artist->slug ?? null);
@endphp

@if($slug)
    <a href="{{ route('artists.show', ['slug' => $slug]) }}" class="block">
@else
    <div class="block">
@endif
    <div class="bg-gray-900/40 rounded-md overflow-hidden hover:bg-gray-800/40 transition-all group">
        {{-- Image container --}}
        <div class="aspect-square p-3">
            <img src="{{ is_array($artist) ? ($artist['image'] ?? '') : ($artist->image ?? '') }}" 
                alt="{{ is_array($artist) ? ($artist['name'] ?? '') : ($artist->name ?? '') }}" 
                class="w-full h-full object-cover rounded-full"
                style="border-radius: 50% !important;"
            >
        </div>

        {{-- Content --}}
        <div class="p-3 text-center">
            <h3 class="font-bold text-base-100 truncate text-sm">
                {{ is_array($artist) ? ($artist['name'] ?? '') : ($artist->name ?? '') }}
            </h3>
            <p class="text-xs text-base-300 mt-1">Artist</p>
        </div>
    </div>
@if($slug)
    </a>
@else
    </div>
@endif
