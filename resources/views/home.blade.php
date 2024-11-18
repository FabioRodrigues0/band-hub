@extends('layout.index')
@section('content')
    <div class="mx-auto max-w-screen-xl px-2 2xl:px-0">
        <!-- Heading & Filters -->
        <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
            <div>
                <h2 class="mt-3 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Popular Artist</h2>
            </div>
        </div>
        <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 grid-cols-4 xl:grid-cols-4">
            @foreach ($artists as $artist)
                <x-card-artist
                    name="{{ $artist->name }}"
                    image="https://miro.medium.com/v2/resize:fit:720/format:webp/1*nUF9iG88r6W9rCHv7Ca7AQ.png"/>
            @endforeach
                <x-card-artist
                    name="{{ $artists[0]->name }}"
                    image="https://miro.medium.com/v2/resize:fit:720/format:webp/1*nUF9iG88r6W9rCHv7Ca7AQ.png"/>
        </div>
    </div>
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <!-- Heading & Filters -->
        <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
            <div>
                <h2 class="mt-3 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Popular Bands</h2>
            </div>
        </div>
        <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($bands as $band)
                <x-card-band
                    title="{{ $band->name }}"
                    subtitle="{{ $band-> year_release }}"
                    image="https://miro.medium.com/v2/resize:fit:720/format:webp/1*nUF9iG88r6W9rCHv7Ca7AQ.png"
                    description="{{ $band->description }}"/>
            @endforeach
        </div>
    </div>
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <!-- Heading & Filters -->
        <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
            <div>
                <h2 class="mt-3 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Popular Albums</h2>
            </div>
        </div>
        <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($albums as $album)
                <x-card-album
                    title="{{ $album->name }}"
                    subtitle="{{ $album-> year_release }}"
                    image="https://miro.medium.com/v2/resize:fit:720/format:webp/1*nUF9iG88r6W9rCHv7Ca7AQ.png"
                    description="{{ $album->description }}"/>
            @endforeach
        </div>
    </div>
@endsection
