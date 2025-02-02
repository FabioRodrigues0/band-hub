@props(['band'])

@php
    $slug = is_array($band) ? ($band['slug'] ?? null) : ($band->slug ?? null);
@endphp

@if($slug)
    <a href="{{ route('bands.show', ['slug' => $slug]) }}" class="block">
@else
    <div class="block">
@endif
    <div class="bg-gray-900/40 rounded-md overflow-hidden hover:bg-gray-800/40 transition-all group">
        {{-- Image container --}}
        <div class="aspect-square">
            <img src="{{ is_array($band) ? ($band['image'] ?? '') : ($band->image ?? '') }}" 
                alt="{{ is_array($band) ? ($band['name'] ?? '') : ($band->name ?? '') }}" 
                class="w-full h-full object-cover"
            >
        </div>

        {{-- Content --}}
        <div class="p-3">
            <h3 class="font-bold text-base-100 truncate text-sm">
                {{ is_array($band) ? ($band['name'] ?? '') : ($band->name ?? '') }}
            </h3>
            <p class="text-xs text-base-300 mt-1">
                {{ is_array($band) ? ($band['genre'] ?? '') : ($band->genre ?? '') }}
            </p>
        </div>
    </div>
@if($slug)
    </a>
@else
    </div>
@endif
