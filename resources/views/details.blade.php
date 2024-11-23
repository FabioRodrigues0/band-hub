@extends('layouts.app')

@section('content')
<div class="p-6" x-data>
    <x-drawer.main />

    @if($openDrawer ?? false)
        <div x-init="$nextTick(() => {
            $dispatch('open-entity-drawer', {
                type: '{{ $type }}',
                mode: 'create'
            });
        })"></div>
    @endif

    @if(isset($item))
        <div class="flex gap-8 mb-8">
            {{-- Hero Image --}}
            <div class="w-64 h-64 flex-shrink-0">
                <img
                    src="{{ Str::contains($item->image, ['artistsImages', 'bandsImages']) ? Storage::url($item->image) : $item->image }}"
                    alt="{{ $item->name }}"
                    class="w-full h-full object-cover {{ $type === 'artist' ? 'rounded-full' : 'rounded-lg' }}"
                >
            </div>

            {{-- Details --}}
            <div class="flex-grow">
                <div class="flex items-center gap-4 mb-4">
                    <h1 class="text-4xl font-bold">{{ $item->name }}</h1>
                    @auth
                        @php
                            $user = Auth::user();

                        @endphp
                        @if($user->user_type->value === 'admin')
                            <button
                                @click="$dispatch('open-entity-drawer', {
                                    type: '{{ $type }}',
                                    mode: 'edit',
                                    id: {{ $item->id }},
                                    data: {
                                        name: {{ json_encode($item->name) }},
                                        description: {{ json_encode($item->description ?? '') }},
                                        genres: {{ json_encode($item->genres ?? '') }},
                                        image: {{ json_encode($item->image) }}
                                    }
                                })"
                                class="bg-primary text-black px-6 py-2 rounded-full font-semibold hover:scale-105 transition-transform"
                            >
                                Edit
                            </button>

                            @if($type === 'band' || $type === 'artist')
                                <button
                                    @click="$dispatch('open-entity-drawer', {
                                        type: 'album',
                                        mode: 'create',
                                        data: { band_id: {{ $item->id }} }
                                    })"
                                    class="bg-zinc-800 text-white px-6 py-2 rounded-full font-semibold hover:scale-105 transition-transform"
                                >
                                    Add Album
                                </button>
                            @endif
                        @endif
                    @endauth
                </div>

                @switch($type)
                    @case('artist')
                        <p class="text-gray-400 mb-4">Artist</p>
                        <div class="text-sm text-gray-400">
                            <p class="mb-2">{{ number_format($item->monthly_listeners) }} monthly listeners</p>
                            <p class="mb-2">{{ $item->bio }}</p>
                            <div class="flex gap-2 mt-4">
                                @foreach(explode(',', $item->genres) as $genre)
                                    <span class="bg-zinc-800 px-3 py-1 rounded-full text-xs">{{ trim($genre) }}</span>
                                @endforeach
                            </div>
                        </div>
                        @break

                    @case('band')
                        <p class="text-gray-400 mb-4">Band</p>
                        <div class="text-sm text-gray-400">
                            <p class="mb-2">Formed in {{ $item->formed_year }}</p>
                            <p class="mb-2">{{ $item->description }}</p>
                            <p class="mb-2">{{ $item->members_count }} members</p>
                            <div class="flex gap-2 mt-4">
                                @foreach(explode(',', $item->genres) as $genre)
                                    <span class="bg-zinc-800 px-3 py-1 rounded-full text-xs">{{ trim($genre) }}</span>
                                @endforeach
                            </div>
                        </div>
                        @break

                    @case('album')
                        <p class="text-gray-400 mb-4">Album</p>
                        <div class="text-sm text-gray-400">
                            <p class="mb-2">By {{ $item->band->name }}</p>
                            <p class="mb-2">Released in {{ $item->year_release }}</p>
                            <p class="mb-2">{{ $item->tracks_count }} tracks</p>
                            <p class="mb-2">{{ $item->duration }}</p>
                            <div class="flex gap-2 mt-4">
                                @foreach(explode(',', $item->genres) as $genre)
                                    <span class="bg-zinc-800 px-3 py-1 rounded-full text-xs">{{ trim($genre) }}</span>
                                @endforeach
                            </div>
                        </div>
                        @break
                @endswitch
            </div>
        </div>

        {{-- Tracks/Albums Section --}}
        <section>
            <h2 class="text-2xl font-bold mb-4">
                @if($type === 'album')
                    Tracks
                @else
                    Albums
                @endif
            </h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-zinc-800">
                        <tr>
                            <th class="p-4 w-12">#</th>
                            @if($type !== 'album')
                                <th class="p-4">Cover</th>
                            @endif
                            <th class="p-4">
                                @if($type === 'album')
                                    Track
                                @else
                                    Album
                                @endif
                            </th>
                            @if($type === 'album')
                                <th class="p-4">Duration</th>
                            @else
                                <th class="p-4">Release Year</th>
                                <th class="p-4">Tracks</th>
                                <th class="p-4">Duration</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @if($type === 'album')
                            @foreach($tracks as $index => $track)
                                <tr class="border-b border-zinc-800 hover:bg-zinc-800/50 group">
                                    <td class="p-4">{{ $index + 1 }}</td>
                                    <td class="p-4 font-medium">{{ $track->name }}</td>
                                    <td class="p-4">{{ $track->duration }}</td>
                                </tr>
                            @endforeach
                        @else
                            @foreach($item as $index => $album)
                                <tr class="border-b border-zinc-800 hover:bg-zinc-800/50 group">
                                    <td class="p-4">{{ $loop->index + 1 }}</td>
                                    <td class="p-4">
                                        <img src="{{ $album['image'] ?? '' }}" alt="{{ $album['name'] ?? '' }}" class="w-12 h-12 object-cover rounded">
                                    </td>
                                    <td class="p-4 font-medium">{{ $album['name'] ?? '' }} ({{ $album['year_release'] ?? '' }})</td>
                                    <td class="p-4">{{ $album['tracks_count'] ?? '' }} tracks</td>
                                    <td class="p-4">{{ $album['duration'] ?? '' }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </section>

        @if($type === 'artist')
            <section>
                <h2 class="text-2xl font-bold mb-4">Bands</h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                    @foreach($item->bands as $band)
                        <x-Cards.card-band :band="$band" />
                    @endforeach
                </div>
            </section>
        @elseif($type === 'band')
            <section>
                <h2 class="text-2xl font-bold mb-4">Artists</h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                    @foreach($item->artists as $artist)
                        <x-Cards.card-artist :artist="$artist" />
                    @endforeach
                </div>
            </section>

            <section class="mt-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-bold">Albums</h2>
                </div>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                    @foreach($item->albums as $album)
                        <x-Cards.card-album :album="$album" />
                    @endforeach
                </div>
            </section>
        @endif
    @else
        {{-- Skeleton Layout --}}
        <div class="max-w-4xl mx-auto">
            <div class="flex gap-8 mb-8">
                {{-- Placeholder Image --}}
                <div class="w-64 h-64 bg-zinc-800 rounded-lg animate-pulse"></div>

                {{-- Placeholder Content --}}
                <div class="flex-grow">
                    <div class="h-10 bg-zinc-800 rounded w-1/2 mb-4 animate-pulse"></div>
                    <div class="h-4 bg-zinc-800 rounded w-1/4 mb-2 animate-pulse"></div>
                    <div class="h-4 bg-zinc-800 rounded w-3/4 mb-2 animate-pulse"></div>
                    <div class="h-4 bg-zinc-800 rounded w-2/3 animate-pulse"></div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
