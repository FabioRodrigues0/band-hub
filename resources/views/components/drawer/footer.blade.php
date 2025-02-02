@props(['submitLabel'])

<div class="flex justify-end space-x-3">
    <button 
        type="button" 
        @click="close" 
        class="px-4 py-2 text-sm font-medium text-gray-400 hover:text-gray-200"
    >
        Cancelar
    </button>
    <button 
        type="submit" 
        class="px-4 py-2 bg-zinc-800 hover:bg-zinc-700 text-gray-200 rounded-md"
    >
        <template x-if="mode === 'create'">
            <span>Criar</span>
        </template>
        <template x-if="mode === 'edit'">
            <span>Atualizar</span>
        </template>
    </button>
</div>
