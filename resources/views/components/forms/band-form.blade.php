@props(['mode' => 'create'])

<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium text-gray-300">Nome da Banda</label>
        <input 
            type="text" 
            name="name" 
            x-model="form.name" 
            class="mt-1 w-full rounded-md bg-zinc-800 border-zinc-700 text-gray-200"
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
        <label class="block text-sm font-medium text-gray-300">Descrição</label>
        <textarea 
            name="description" 
            x-model="form.description" 
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
            <div class="flex-1">
                <p class="text-sm text-zinc-400">Click to upload or drag and drop</p>
                <p class="text-xs text-zinc-500 mt-1">PNG, JPG up to 10MB</p>
            </div>
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-300">Artista</label>
        <select 
            name="artist_id" 
            x-model="form.artist_id" 
            class="mt-1 w-full rounded-md bg-zinc-800 border-zinc-700 text-gray-200"
        >
            <option value="">Selecione um artista</option>
            @foreach(\App\Models\Artist::all() as $artist)
                <option value="{{ $artist->id }}">{{ $artist->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-300">Álbum</label>
        <select 
            name="album_id" 
            x-model="form.album_id" 
            class="mt-1 w-full rounded-md bg-zinc-800 border-zinc-700 text-gray-200"
        >
            <option value="">Selecione um álbum</option>
            @foreach(\App\Models\Album::all() as $album)
                <option value="{{ $album->id }}">{{ $album->name }}</option>
            @endforeach
        </select>
    </div>
</div>
