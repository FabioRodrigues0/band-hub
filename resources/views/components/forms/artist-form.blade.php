@props(['mode' => 'create'])

<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium text-gray-300">Nome do Artista</label>
        <input 
            type="text" 
            name="name" 
            x-model="form.name" 
            class="mt-1 w-full rounded-md bg-zinc-800 border-zinc-700 text-gray-200"
            required
        >
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-300">Gêneros</label>
        <input 
            type="text" 
            name="genres" 
            x-model="form.genres" 
            class="mt-1 w-full rounded-md bg-zinc-800 border-zinc-700 text-gray-200"
        >
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-300">Biografia</label>
        <textarea 
            name="bio" 
            x-model="form.bio" 
            class="mt-1 w-full rounded-md bg-zinc-800 border-zinc-700 text-gray-200" 
            rows="3"
        ></textarea>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-300">Foto</label>
        <input 
            type="file" 
            name="image" 
            @change="handleFileInput" 
            class="mt-1 w-full text-gray-400"
            accept="image/*"
            style="display: block;"
        >
        <div class="mt-1 flex items-center gap-4">
            <div class="relative">
                <div class="w-32 h-32 bg-zinc-800 border-2 border-dashed border-zinc-700 rounded-lg flex items-center justify-center">
                    <template x-if="!photoPreview">
                        <span class="text-zinc-500">Click to upload or drag and drop</span>
                    </template>
                    <template x-if="photoPreview">
                        <img :src="photoPreview" class="w-full h-full object-cover rounded-lg">
                    </template>
                </div>
            </div>
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-300">Instrumento</label>
        <input 
            type="text" 
            name="instrument" 
            x-model="form.instrument" 
            class="mt-1 w-full rounded-md bg-zinc-800 border-zinc-700 text-gray-200"
        >
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-300">Bandas</label>
        <select 
            name="bands[]" 
            x-model="form.bands" 
            class="mt-1 w-full rounded-md bg-zinc-800 border-zinc-700 text-gray-200"
            multiple
        >
            @foreach(\App\Models\Band::all() as $band)
                <option value="{{ $band->id }}">{{ $band->name }}</option>
            @endforeach
        </select>
        <p class="mt-1 text-sm text-gray-400">Pressione Ctrl para selecionar múltiplas bandas</p>
    </div>
</div>
