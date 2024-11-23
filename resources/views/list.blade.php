@extends('layouts.app')

@section('content')
<div class="min-h-screen p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-200 capitalize">{{ $type }}</h1>
        @auth
            @if(in_array($type, ['artists', 'bands', 'albums']))
                <a href="{{ route($type . '.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                    Add New {{ Str::singular(ucfirst($type)) }}
                </a>
            @endif
        @endauth
    </div>

    <div class="overflow-x-auto relative">
        <table class="w-full text-sm text-left text-gray-300">
            <thead class="text-xs uppercase bg-zinc-800 text-gray-400">
                <tr>
                    @if($type === 'artists')
                        <th scope="col" class="py-3 px-6">Image</th>
                        <th scope="col" class="py-3 px-6">Name</th>
                        <th scope="col" class="py-3 px-6">Description</th>
                        <th scope="col" class="py-3 px-6">Bands</th>
                        <th scope="col" class="py-3 px-6">Actions</th>
                    @elseif($type === 'bands')
                        <th scope="col" class="py-3 px-6">Image</th>
                        <th scope="col" class="py-3 px-6">Name</th>
                        <th scope="col" class="py-3 px-6">Description</th>
                        <th scope="col" class="py-3 px-6">Artists</th>
                        <th scope="col" class="py-3 px-6">Albums</th>
                        <th scope="col" class="py-3 px-6">Actions</th>
                    @elseif($type === 'albums')
                        <th scope="col" class="py-3 px-6">Image</th>
                        <th scope="col" class="py-3 px-6">Name</th>
                        <th scope="col" class="py-3 px-6">Description</th>
                        <th scope="col" class="py-3 px-6">Band</th>
                        <th scope="col" class="py-3 px-6">Release Year</th>
                        <th scope="col" class="py-3 px-6">Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                    <tr class="border-b bg-zinc-900 border-zinc-700 hover:bg-zinc-800">
                        @if($type === 'artists')
                            <td class="py-4 px-6">
                                <img src="{{ $item->image ?? 'https://via.placeholder.com/50x50' }}" 
                                     alt="{{ $item->name }}" 
                                     class="w-12 h-12 rounded-full object-cover">
                            </td>
                            <td class="py-4 px-6">{{ $item->name }}</td>
                            <td class="py-4 px-6">{{ Str::limit($item->description, 100) }}</td>
                            <td class="py-4 px-6">
                                {{ $item->bands->pluck('name')->join(', ') }}
                            </td>
                            <td class="py-4 px-6">
                                <a href="{{ route('artists.show', $item) }}" class="text-indigo-500 hover:text-indigo-400">View</a>
                                @auth
                                    <a href="{{ route('artists.edit', $item) }}" class="ml-2 text-yellow-500 hover:text-yellow-400">Edit</a>
                                @endauth
                            </td>
                        @elseif($type === 'bands')
                            <td class="py-4 px-6">
                                <img src="{{ $item->image ?? 'https://via.placeholder.com/50x50' }}" 
                                     alt="{{ $item->name }}" 
                                     class="w-12 h-12 rounded object-cover">
                            </td>
                            <td class="py-4 px-6">{{ $item->name }}</td>
                            <td class="py-4 px-6">{{ Str::limit($item->description, 100) }}</td>
                            <td class="py-4 px-6">
                                {{ $item->artists->pluck('name')->join(', ') }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $item->albums->count() }}
                            </td>
                            <td class="py-4 px-6">
                                <a href="{{ route('bands.show', $item) }}" class="text-indigo-500 hover:text-indigo-400">View</a>
                                @auth
                                    <a href="{{ route('bands.edit', $item) }}" class="ml-2 text-yellow-500 hover:text-yellow-400">Edit</a>
                                @endauth
                            </td>
                        @elseif($type === 'albums')
                            <td class="py-4 px-6">
                                <img src="{{ $item->image ?? 'https://via.placeholder.com/50x50' }}" 
                                     alt="{{ $item->name }}" 
                                     class="w-12 h-12 rounded object-cover">
                            </td>
                            <td class="py-4 px-6">{{ $item->name }}</td>
                            <td class="py-4 px-6">{{ Str::limit($item->description, 100) }}</td>
                            <td class="py-4 px-6">{{ $item->band->name ?? 'No Band' }}</td>
                            <td class="py-4 px-6">{{ $item->year_release ?? 'Not Set' }}</td>
                            <td class="py-4 px-6">
                                <a href="{{ route('albums.show', $item) }}" class="text-indigo-500 hover:text-indigo-400">View</a>
                                @auth
                                    <a href="{{ route('albums.edit', $item) }}" class="ml-2 text-yellow-500 hover:text-yellow-400">Edit</a>
                                @endauth
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-4 px-6 text-center text-gray-400">
                            No {{ $type }} found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $items->links() }}
    </div>
</div>
@endsection
