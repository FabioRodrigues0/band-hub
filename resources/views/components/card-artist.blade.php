<div>
    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
    <a href="#">
        <img class="rounded-full w-96 h-96"
             @isset($image) src="{{ $image }}" @endif @isset($name) alt="{{ $name }}" @endif/>
    </a>
    <div class="pt-6 justify-center">
        <a href="#" class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">
            @isset($name) {{ $name }} @endif
        </a>
    </div>
</div>
