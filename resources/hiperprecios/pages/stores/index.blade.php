<x-hiper-precios-layout>
    <h1>Stores</h1>
    @foreach ($stores as $store)
    {{ $store }}<br />
    @endforeach
</x-hiper-precios-layout>
