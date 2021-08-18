<x-hiper-precios-layout>
    <div class="w-full p-6 md:px-12 text-cemter">
        <h1 class="w-full text-xl font-bold leading-relaxed">
            {{ __('Edit :store', ['store' => $store->name]) }}
        </h1>

        @if ($errors->any())
        <div class="items-center w-full mt-6">
            <div class="w-full text-red-600 border-2 border-red-200 rounded-lg">
                <div class="flex items-center justify-between px-4 py-2 mx-auto">
                    <div class="flex flex-col">
                        @foreach ($errors->all() as $error)
                        <p class="text-sm font-semibold tracking-wide uppercase">
                            <i class="mr-2 text-sm fas fa-exclamation-triangle"></i> {{ $error }}
                        </p>
                        @endforeach
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

        <form id="storeEdit" method="POST" action="{{ route('store.update', ['store' => $store->id]) }}">
            @csrf
            @method('POST')
            <table class="table w-full mt-10">
                <thead>
                    <tr class="text-center">
                        <td class="w-3/12">{{ __('Name') }}</td>
                        <td class="w-1/12">&nbsp;</td>
                        <td class="w-5/12">{{ __('Url') }}</td>
                        <td class="w-1/12">&nbsp;</td>
                        <td class="w-2/12">{{ __('Is a VTEX Store?') }}</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="text" name="name" value="{{ $store->name }}"
                                class="w-full px-4 py-2 mt-2 text-base text-black transition duration-150 ease-in-out transform bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-gray-200 focus:outline-none focus:shadow-outline focus:ring-0 ring-offset-current ring-offset-0" />
                        </td>
                        <td>&nbsp;</td>
                        <td>
                            <input type="text" name="store_url" value="{{ $store->store_url }}"
                                class="w-full px-4 py-2 mt-2 text-base text-black transition duration-150 ease-in-out transform bg-gray-100 border-transparent rounded-lg focus:border-gray-500 focus:bg-gray-200 focus:outline-none focus:shadow-outline focus:ring-0 ring-offset-current ring-offset-0" />
                        </td>
                        <td>&nbsp;</td>
                        <td class="text-center">
                            <input type="checkbox" name="is_vtex_store" checked="{{ $store->is_vtex_store }}"
                                class="form-checkbox" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td class="text-center">
                            <a onclick="document.getElementById('storeEdit').submit();"
                                class="w-1/2 px-4 py-2 my-2 mr-2 text-base text-white transition duration-150 ease-in-out transform bg-green-600 border-green-600 rounded-md cursor-pointer focus:shadow-outline focus:outline-none focus:ring-0 ring-offset-current ring-offset-0 hover:bg-green-800">
                                <i class="fa fa-check"></i> {{ __('Save') }}
                            </a>
                            <a href="{{ route('store') }}"
                                class="w-1/2 px-4 py-2 my-2 mr-2 text-base text-white transition duration-150 ease-in-out transform bg-red-600 border-red-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-0 ring-offset-current ring-offset-0 hover:bg-red-800">
                                <i class="fa fa-times"></i> {{ __('Cancel') }}
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</x-hiper-precios-layout>
