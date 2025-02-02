@props(['type', 'id'])

@auth
    <div class="absolute top-2 right-2 flex gap-2">
        @if(Auth::user()->user_type === 'admin' || Auth::user()->user_type === 'user')
            <button 
                @click="$dispatch('open-drawer'); $dispatch('edit-{{ $type }}', { id: {{ $id }} })"
                class="p-1.5 bg-zinc-800/80 hover:bg-zinc-700/80 rounded-full text-gray-400 hover:text-gray-200 transition-colors"
                title="Editar"
            >
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                </svg>
            </button>
        @endif

        @if(Auth::user()->user_type === 'admin')
            <button 
                @click="if(confirm('Tem certeza que deseja excluir este item?')) $dispatch('delete-{{ $type }}', { id: {{ $id }} })"
                class="p-1.5 bg-red-900/80 hover:bg-red-800/80 rounded-full text-red-200 hover:text-red-100 transition-colors"
                title="Excluir"
            >
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                </svg>
            </button>
        @endif
    </div>
@endauth
