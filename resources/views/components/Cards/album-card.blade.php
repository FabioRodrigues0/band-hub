@props(['album'])

<div class="group relative bg-base-600 rounded-md p-4 hover:bg-base-700 transition-all duration-200 cursor-pointer">
    <div class="relative aspect-square mb-4">
        <img 
            src="{{ $album['cover'] ?? 'https://via.placeholder.com/300' }}" 
            alt="{{ $album['name'] }}" 
            class="w-full h-full object-cover rounded-md"
        >
        <button 
            class="absolute bottom-2 right-2 w-12 h-12 bg-primary rounded-full shadow-lg flex items-center justify-center opacity-0 translate-y-3 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-200 hover:scale-105"
            aria-label="Play {{ $album['name'] }}"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" viewBox="0 0 24 24" fill="currentColor">
                <path d="M8 5v14l11-7z"/>
            </svg>
        </button>
    </div>
    <h3 class="text-base-300 font-bold truncate">{{ $album['name'] }}</h3>
    <p class="text-base-400 text-sm mt-1 truncate">{{ $album['artist'] }}</p>
    <p class="text-base-400 text-sm mt-1">{{ $album['year'] }}</p>
</div>
