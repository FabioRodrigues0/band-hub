<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">{{ $band->name }}</h1>
            
            @auth
                @can('update', $band)
                    <button 
                        @click="$dispatch('open-entity-drawer', { type: 'band', mode: 'edit', id: {{ $band->id }} })"
                        class="px-4 py-2 bg-zinc-800 hover:bg-zinc-700 rounded-md transition-colors"
                    >
                        Editar Banda
                    </button>
                @endcan
            @endauth
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Band Image -->
            <div class="md:col-span-1">
                <img src="{{ $band->image }}" alt="{{ $band->name }}" class="w-full rounded-lg shadow-lg">
            </div>

            <!-- Band Info -->
            <div class="md:col-span-2 space-y-6">
                <div>
                    <h2 class="text-xl font-semibold mb-2">Gêneros</h2>
                    <p class="text-gray-400">{{ $band->genres }}</p>
                </div>

                @if($band->description)
                    <div>
                        <h2 class="text-xl font-semibold mb-2">Sobre</h2>
                        <p class="text-gray-400">{{ $band->description }}</p>
                    </div>
                @endif

                <!-- Albums Section -->
                <div>
                    <h2 class="text-xl font-semibold mb-4">Álbuns</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach($band->albums as $album)
                            <x-cards.card-album :album="$album" />
                        @endforeach
                    </div>
                </div>

                <!-- Artists Section -->
                <div>
                    <h2 class="text-xl font-semibold mb-4">Artistas</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach($band->artists as $artist)
                            <x-cards.card-artist :artist="$artist" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
