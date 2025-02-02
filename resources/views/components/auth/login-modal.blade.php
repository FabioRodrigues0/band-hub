    <div x-data="loginModal"
     x-show="show"
     @open-login-modal.window="show = true"
     @close-login-modal.window="show = false"
     @keydown.escape.window="show = false"
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-[9999] overflow-y-auto"
     style="display: none;">
    
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black bg-opacity-50 z-[9998]" @click="show = false"></div>

    <!-- Modal -->
    <div class="relative flex items-center justify-center min-h-screen p-4">
        <div class="relative w-full max-w-md bg-zinc-900/95 backdrop-blur-sm rounded-lg shadow-lg z-[9999]"
             @click.stop>
            
            <!-- Close button -->
            <button type="button" 
                    class="absolute top-3 right-3 text-gray-400 hover:text-gray-200"
                    @click="show = false">
                <span class="sr-only">Close</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Modal content -->
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <div class="flex items-center justify-center">
                    <img class="w-8 h-8 mr-2" src="/img/logo.png" alt="logo">
                    <h2 class="text-2xl font-semibold text-gray-200">Band Hub</h2>
                </div>
                
                <h3 class="text-xl font-bold leading-tight tracking-tight text-gray-200 md:text-2xl text-center">
                    Sign in to your account
                </h3>

                <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-300">Your email</label>
                        <input type="email" 
                               name="email" 
                               id="email" 
                               class="bg-zinc-800 border border-zinc-700 text-gray-200 sm:text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5" 
                               placeholder="name@company.com" 
                               required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-300">Password</label>
                        <input type="password" 
                               name="password" 
                               id="password" 
                               placeholder="••••••••" 
                               class="bg-zinc-800 border border-zinc-700 text-gray-200 sm:text-sm rounded-lg focus:ring-indigo-600 focus:border-indigo-600 block w-full p-2.5" 
                               required="">
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" 
                                       name="remember"
                                       aria-describedby="remember" 
                                       type="checkbox" 
                                       class="w-4 h-4 border border-zinc-700 rounded bg-zinc-800 focus:ring-3 focus:ring-indigo-600">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remember" class="text-gray-300">Remember me</label>
                            </div>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm font-medium text-indigo-500 hover:underline">
                                Forgot password?
                            </a>
                        @endif
                    </div>
                    <button type="submit" 
                            class="w-full text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Sign in
                    </button>
                    <p class="text-sm font-light text-gray-400">
                        Don't have an account yet? 
                        <a href="{{ route('register') }}" class="font-medium text-indigo-500 hover:underline">
                            Sign up
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
