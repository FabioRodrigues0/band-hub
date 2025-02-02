@props(['artist'])

<div class="relative bg-zinc-900/40 rounded-lg overflow-hidden hover:bg-zinc-800/40 transition-all group cursor-pointer"
     @click="$dispatch('open-entity-drawer', { 
        type: 'artist', 
        mode: 'view',
        entity: @js($artist)
     })">
    {{-- Image container --}}
    <div class="p-4 pb-0">
        <div class="aspect-square rounded-lg overflow-hidden bg-zinc-800">
            <img src="{{ is_array($artist) ? ($artist['image'] ?? 'https://via.placeholder.com/300') : ($artist->image ?? 'https://via.placeholder.com/300') }}" 
                alt="{{ is_array($artist) ? ($artist['name'] ?? '') : ($artist->name ?? '') }}" 
                class="w-full h-full object-cover"
            >
        </div>
    </div>

    {{-- Content --}}
    <div class="p-4">
        <h3 class="font-semibold text-gray-200 truncate">{{ is_array($artist) ? ($artist['name'] ?? '') : ($artist->name ?? '') }}</h3>
        @if(is_array($artist) ? ($artist['albums_count'] ?? false) : ($artist->albums_count ?? false))
            <p class="text-sm text-gray-400 mt-1">{{ is_array($artist) ? ($artist['albums_count'] ?? '') : ($artist->albums_count ?? '') }} álbuns</p>
        @endif
    </div>

    {{-- Action buttons (absolute positioned) --}}
    <div class="absolute bottom-4 right-4 space-x-2 opacity-0 translate-y-3 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-200">
        <button type="button" 
                class="p-2 bg-zinc-800 hover:bg-zinc-700 rounded-full shadow-lg transition-colors"
                @click.stop="$dispatch('open-entity-drawer', { 
                    type: 'artist', 
                    mode: 'edit',
                    id: {{ is_array($artist) ? ($artist['id'] ?? '') : ($artist->id ?? '') }}
                })"
                title="Editar">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
            </svg>
        </button>
    </div>
</div>
