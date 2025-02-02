@auth
    <div class="p-4 border-t border-zinc-800" x-data>
        <div class="flex items-center space-x-3">
            <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}" 
                 alt="{{ Auth::user()->name }}" 
                 class="w-10 h-10 rounded-full">
            <div>
                <p class="text-sm font-medium text-gray-200">{{ Auth::user()->name }}</p>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-xs text-gray-400 hover:text-white">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
@else
    <div class="p-4 border-t border-zinc-800" x-data>
        <div class="space-y-2">
            <button type="button"
                    @click="$dispatch('open-login-modal')"
                    class="block w-full px-4 py-2 text-sm text-center text-white bg-indigo-600 rounded-md hover:bg-indigo-700 transition-colors">
                Sign in
            </button>
            <a href="{{ route('register') }}"
               class="block w-full px-4 py-2 text-sm text-center text-gray-200 bg-zinc-800 rounded-md hover:bg-zinc-700 transition-colors">
                Create Account
            </a>
        </div>
    </div>
@endauth
