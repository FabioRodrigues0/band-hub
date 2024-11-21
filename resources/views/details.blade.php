@extends('layout.index')
@section('content')
<div class="relative bg-zinc-900 min-h-full flex flex-col overflow-x-hidden rounded-lg">
    <div class="flex flex-col items-center md:flex-row md:items-stretch gap-8 px-6">
        <div class="h-52 w-52 flex-none">
            <img src="{{$band->image}}" alt="{{$band->name}}"
                class="object-cover h-full w-full shadow-[5px_0_30px_0px_rgba(0,0,0,0.3)]" />
        </div>
        <div class="flex flex-col justify-between">
            <div class="flex flex-1 items-end">Playlist</div>
            <div>
                <h1 class="title-clamp font-bold block">
                    {playlist?.title}
                    <span transition:name=`playlist ${playlist?.id} title`></span>
                </h1>
            </div>
            <div class="flex-1 flex items-end">
                <div class="text-sm">
                    <x-details-title name="{{$band->name}}"/>
                    <div class="mt-1">
                        <span class="font-semibold">58 likes</span>, 83 musics, <span
                            class="text-gray-300">about 3h 15min</span
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-zinc-900/30 mt-6 flex-1 p-6 blur-100">
        <div class="flex gap-1 items-center">
            <x-play-button/>
            <div class="ml-4"></div>
            <x-like-button/>
            <x-dots-button/>
        </div>
        <div class="px-6 pt-4">
            @isset($band)
                <x-table :data="$band" :albums="$albums"/>
            @endisset
            @isset($artist)
                <x-table :data="$artist" :albums="$albums" />
            @endisset
        </div>
    </div>
    <div class="absolute h-screen inset-0 z-[-1] bg-gradient-to-b from-context">
        <img src="{{$band->image}}" alt="{{$band->name}}"
            class="el-to-fade transition-all duration-500 z-[-1] absolute inset-0 mix-blend-overlay opacity-20 scale-90 w-full h-full object-cover blur-md" />
        <div class="absolute inset-0 bg-gradient-to-t via-transparent from-zinc-900">
        </div>
    </div>
</div>
@endsection


