@props(['class' => ''])

<a href="{{ route('home') }}" class="flex items-center mb-5 {{ $class }}">
    <svg class="w-8 h-8 text-primary" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
        <path d="M19.952 1.651a.75.75 0 01.298.599V16.303a3 3 0 01-2.176 2.884l-1.32.377a2.553 2.553 0 11-1.403-4.909l2.311-.66a1 1 0 00.713-.96V5.625a1 1 0 00-1.343-.958l-6.002 1.72a1 1 0 00-.707.958v9.466a3 3 0 01-2.176 2.884l-1.32.377a2.553 2.553 0 11-1.402-4.909l2.31-.66a1 1 0 00.713-.96V2.25a.75.75 0 01.933-.72l10.484 3z"/>
    </svg>
    <span class="ml-3 text-xl font-bold text-base-300">Band Hub</span>
</a>
