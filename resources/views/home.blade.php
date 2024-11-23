@extends('layouts.app')

@section('content')
<div class="min-h-screen p-6">
    @if(Auth::check())
        <h1 class="text-4xl font-bold mb-8 text-gray-200">Hello, {{ Auth::user()->name }}</h1>
    @else
        <x-welcome-message />
    @endif

    <!-- Recently Played Section -->
    <section class="mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-200">Recently Played</h2>
            <a href="{{ route('list', ['type' => 'recently-played']) }}" class="text-sm text-gray-400 hover:text-white">View All</a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-6">
            @forelse($recentlyPlayed as $item)
                <div class="w-full">
                    <x-Cards.card-album :album="$item" />
                </div>
            @empty
                <div class="col-span-4 text-center text-gray-400">No recently played items found</div>
            @endforelse
        </div>
    </section>

    <!-- Popular Artists Section -->
    <section class="mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-200">Popular Artists</h2>
            <a href="{{ route('list', ['type' => 'artists']) }}" class="text-sm text-gray-400 hover:text-white">View All</a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-6">
            @forelse($artists as $artist)
                <div class="w-full">
                    <x-Cards.card-artist :artist="$artist" />
                </div>
            @empty
                <div class="col-span-4 text-center text-gray-400">No artists found</div>
            @endforelse
        </div>
    </section>

    <!-- Popular Bands Section -->
    <section class="mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-200">Popular Bands</h2>
            <a href="{{ route('list', ['type' => 'bands']) }}" class="text-sm text-gray-400 hover:text-white">View All</a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-6">
            @forelse($bands as $band)
                <div class="w-full">
                    <x-Cards.card-band :band="$band" />
                </div>
            @empty
                <div class="col-span-4 text-center text-gray-400">No bands found</div>
            @endforelse
        </div>
    </section>

    <!-- Featured Albums Section -->
    <section>
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-200">Featured Albums</h2>
            <a href="{{ route('list', ['type' => 'albums']) }}" class="text-sm text-gray-400 hover:text-white">View All</a>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-6">
            @forelse($albums as $album)
                <div class="w-full">
                    <x-Cards.card-album :album="$album" />
                </div>
            @empty
                <div class="col-span-4 text-center text-gray-400">No albums found</div>
            @endforelse
        </div>
    </section>
</div>
@endsection
