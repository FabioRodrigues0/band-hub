@guest
    <div class="text-center py-12">
        <h1 class="text-4xl font-bold mb-4 text-gray-200">Welcome to Band Hub</h1>
        <p class="text-xl text-gray-400 mb-6">Discover and enjoy your favorite music</p>
        <div class="flex justify-center gap-4" x-data>
            <button type="button" 
                   @click="$dispatch('open-login-modal')"
                   class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                Browse Bands
            </button>
            <button type="button"
                   @click="$dispatch('open-login-modal')"
                   class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-zinc-800 hover:bg-zinc-700">
                Browse Artists
            </button>
        </div>
    </div>
@endguest
