<x-hiper-precios-layout>
    <div class="w-full p-6 md:px-12 text-cemter">

        <h1 class="w-full text-xl font-bold leading-relaxed">
            {{ __('Stores Management') }}
        </h1>

        @if (session('status'))
        <div class="items-center w-full mt-6">
            <div
                class="w-full text-{{ session('status')['color'] }}-600 border-2 border-{{ session('status')['color'] }}-200 rounded-lg">
                <div class="flex items-center justify-between px-4 py-2 mx-auto">
                    <div class="flex">
                        <i class="mr-4 text-sm fas fa-{{ session('status')['icon'] }}"></i>
                        <p class="text-sm font-semibold tracking-wide uppercase ">
                            {!! session('status')['text'] !!}
                        </p>
                    </div>
                    <button
                        class="p-1 text-sm transition-colors duration-200 transform rounded-md hover:bg-opacity-25 hover:bg-blueGray-600 focus:outline-none"
                        type="button" aria-label="Close" aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </div>
        @endif

        <table class="table w-full mt-10 border-2">
            <thead class="border-b-2">
                <tr class="text-center">
                    <td class="py-4">{{ __('Store') }}</td>
                    <td class="py-4">{{ __('Total Categories') }}</td>
                    <td class="py-4">{{ __('Total Products') }}</td>
                    <td class="py-4">{{ __('Last Products Update') }}</td>
                    <td class="py-4">{{ __('Added on') }}</td>
                    <td colspan="2">
                        <a href="{{ route('store.create') }}"
                            class="px-2 py-1 text-sm text-center text-white transition duration-150 ease-in-out transform bg-green-600 border-green-600 rounded-md cursor-pointer focus:shadow-outline focus:outline-none focus:ring-0 ring-offset-current ring-offset-0 hover:bg-green-800">
                            <i class="fas fa-plus"></i> {{ __('New Store') }}
                        </a>
                    </td>
                </tr>
            </thead>
            <tbody>
                @forelse ($stores as $idx => $store)
                <tr>
                    <td class="px-4 py-4">{{ $store->name }}</td>
                    <td class="py-4 text-center">{{ $store->total_categories }}</td>
                    <td class="py-4 text-center">{{ $store->total_products }}</td>
                    <td class="py-4 text-center">{{ $store->last_products_update }}</td>
                    <td class="py-4 text-center">{{ $store->created_at }}</td>
                    <td>
                        <form id="storeRemove{{ $idx }}" class="flex flex-row items-center justify-around w-full"
                            method="POST" action="{{ route('store.remove', ['store' => $store->id]) }}">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('store.edit', ['store' => $store->id]) }}"
                                class="w-1/3 py-1 pl-2 pr-1 text-sm text-center text-white transition duration-150 ease-in-out transform bg-blue-600 border-blue-600 rounded-md cursor-pointer focus:shadow-outline focus:outline-none focus:ring-0 ring-offset-current ring-offset-0 hover:bg-blue-800">
                                <i class="fas fa-pen-nib"></i>
                            </a>
                            <a onclick="document.getElementById('storeRemove{{ $idx }}').submit();"
                                class="w-1/3 px-2 py-1 text-sm text-center text-white transition duration-150 ease-in-out transform bg-red-600 border-red-600 rounded-md cursor-pointer focus:shadow-outline focus:outline-none focus:ring-0 ring-offset-current ring-offset-0 hover:bg-red-800">
                                <i class="fas fa-trash"></i>
                            </a>
                        </form>
                    </td>
                    <td>
                        <form id="storeUpdate{{ $idx }}" class="flex flex-row items-center justify-around w-full"
                            method="POST" action="{{ route('products.update', ['store' => $store->id]) }}">
                            @csrf
                            <a onclick="document.getElementById('storeUpdate{{ $idx }}').submit();"
                                class="w-1/2 px-2 py-1 text-sm text-center text-white transition duration-150 ease-in-out transform bg-yellow-600 border-yellow-600 rounded-md cursor-pointer focus:shadow-outline focus:outline-none focus:ring-0 ring-offset-current ring-offset-0 hover:bg-yellow-800">
                                <i class="fas fa-sync-alt"></i>
                            </a>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-4 text-center">
                        {{ __('No available stores in the system') }}
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-hiper-precios-layout>
