@props(['mode' => 'create'])

<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium text-gray-300">Nome do Álbum</label>
        <input 
            type="text" 
            name="name" 
            x-model="form.name" 
            class="mt-1 w-full rounded-md bg-zinc-800 border-zinc-700 text-gray-200"
        >
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-300">Ano de Lançamento</label>
        <input 
            type="number" 
            name="release_year" 
            x-model="form.release_year" 
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
        <label class="block text-sm font-medium text-gray-300">Capa do Álbum</label>
        <input 
            type="file" 
            name="photo" 
            @change="handleFileInput" 
            class="mt-1 w-full text-gray-400"
            accept="image/*"
        >
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-300">Banda</label>
        <select 
            name="band_id" 
            x-model="form.band_id" 
            class="mt-1 w-full rounded-md bg-zinc-800 border-zinc-700 text-gray-200"
        >
            <option value="">Selecione uma banda</option>
            @foreach(\App\Models\Band::all() as $band)
                <option value="{{ $band->id }}">{{ $band->name }}</option>
            @endforeach
        </select>
    </div>
</div>
