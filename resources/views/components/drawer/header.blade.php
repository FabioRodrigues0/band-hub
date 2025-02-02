@props(['title'])

<div class="p-4 border-b border-zinc-800 flex justify-between items-center">
    <h2 class="text-xl font-semibold text-gray-200" x-text="title"></h2>
    <button @click="close" class="text-gray-400 hover:text-gray-200">
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>
