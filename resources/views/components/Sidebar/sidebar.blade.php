@props(['class' => ''])

<aside class="fixed top-0 left-0 z-40 w-64 h-screen bg-zinc-900/95 border-r border-zinc-800 {{ $class }}" aria-label="Sidebar">
    <div class="h-full px-3 py-4 flex flex-col">
        <x-sidebar.sidebar-brand />
        
        <ul class="space-y-2 mt-6 font-medium">
            <x-sidebar.sidebar-item href="{{ route('home') }}" icon="home" text="Home" />
            <x-sidebar.sidebar-item href="{{ route('list', 'artists') }}" icon="library" text="Artists" />
            <x-sidebar.sidebar-item href="{{ route('list', 'bands') }}" icon="library" text="Bands" />
            <x-sidebar.sidebar-item href="{{ route('list', 'albums') }}" icon="library" text="Albums" />
        </ul>

        @auth
            @if(Auth::user()->user_type->value === 'admin')
                <ul class="space-y-2 mt-6 pt-6 border-t border-zinc-800">
                    <x-sidebar.sidebar-item 
                        href="{{ route('bands.create') }}"
                        @click="window.location.href = '{{ route('bands.create') }}'"
                        icon="plus" 
                        text="Add New Band" 
                    />
                    <x-sidebar.sidebar-item 
                        href="{{ route('artists.create') }}"
                        @click.prevent="$dispatch('open-entity-drawer', { type: 'artist', mode: 'create' })"
                        icon="plus" 
                        text="Add New Artist" 
                    />
                </ul>
            @endif
        @endauth

        <ul class="space-y-2 mt-6 pt-6 border-t border-zinc-800">
            <x-sidebar.sidebar-item href="#" icon="plus" text="Create Playlist" disabled="true" />
            <x-sidebar.sidebar-item href="#" disabled="true">
                <x-slot name="icon">
                    <svg class="w-6 h-6 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                    </svg>
                </x-slot>
                Liked Songs
            </x-sidebar.sidebar-item>
        </ul>

        <x-sidebar.auth-section class="mt-auto" />
        
        <div class="flex-grow"></div>

        <x-sidebar.sidebar-footer />
    </div>
</aside>
