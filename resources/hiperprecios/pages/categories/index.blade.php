<x-hiper-precios-layout>
    <div class="w-full p-6 md:px-12 text-cemter">

        <h1 class="w-full text-xl font-bold leading-relaxed">
            {{ __('Stores Management') }}
        </h1>

        @foreach ($categories as $category)
        {{ $category->id }}<br />
        {{ $category->name }}<br />
        {{ $category->storeowner->name }}<br />
        {{ '==================================' }}<br />
        @endforeach

    </div>
</x-hiper-precios-layout>
