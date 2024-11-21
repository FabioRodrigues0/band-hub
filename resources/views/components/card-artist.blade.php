<div>
    <a href="{{route('artist.show', $slug)}}" class="block justify-items-center">
        <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
        <img class="object-cover aspect-square"
             @isset($image) src="{{ $image }}" @endif @isset($name) alt="{{ $name }}" @endif
             style="border-radius: 50% !important;width: 200px; height: 200px"/>
        <div class="pt-6 justify-center justify-items-center">
            <a href="#" class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white align-center">
                @isset($name) {{ $name }} @endif
            </a>
        </div>
    </a>
</div>

