<a href="{{route('bands.show', $slug )}}">
    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
    <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
        <div class="h-56 w-full">
                <img class="mx-auto h-full dark:hidden rounded-full"
                     @isset($image) src="{{ $image }}" @endif @isset($title) alt="{{ $title }}" @endif/>
                <img class="mx-auto hidden h-full dark:block rounded-full"
                     @isset($image) src="{{ $image }}" @endif @isset($title) alt="{{ $title }}" @endif/>
        </div>
        <div class="pt-6">

            <span class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">
                @isset($title) {{ $title }} @endif
            </span>
            <span class="bg-{{$colors[array_rand($colors)]}}-100 text-{{$colors[array_rand($colors)]}}-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-{{$colors[array_rand($colors)]}}-900 dark:text-{{$colors[array_rand($colors)]}}-300">
                Default
            </span>
            <p class="text-sm font-medium text-black dark:text-gray-400">
                @isset($description) {{ $description }} @endif
            </p>
            <div class="mt-4 flex items-center justify-between gap-4">
                <button type="button"
                        class="inline-flex items-center rounded-lg bg-midnight px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6"/>
                    </svg>
                    Show More
                </button>
            </div>
        </div>
    </div>
</a>
