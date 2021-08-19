<x-hiper-precios-layout>
    <div class="w-full p-6 md:px-12 text-cemter">

        <h1 class="w-full text-xl font-bold leading-relaxed">
            {{ __('Categories Detail') }}
        </h1>

        @foreach ($categories as $category)
        {{ $category->name }}<br />
        @foreach ($category->productsQuantity as $categoryUpdate)
        &nbsp; &nbsp; {{ $categoryUpdate->storeOwner->name }} => {{ $categoryUpdate->product_totals }}<br />
        @endforeach
        {{ '==================================' }}<br />
        @endforeach

    </div>
</x-hiper-precios-layout>
