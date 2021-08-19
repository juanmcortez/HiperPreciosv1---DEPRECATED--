<x-hiper-precios-layout>
    <div class="w-full p-6 md:px-12 text-cemter">

        <h1 class="w-full text-xl font-bold leading-relaxed">
            {{ __('Categories Detail') }}
        </h1>

        <table class="table w-full mt-10 border-2">
            <thead class="border-b-2">
                <tr class="text-center">
                    <td class="py-4">{{ __('Category') }}</td>
                    <td class="py-4">{{ __('Total Products') }}</td>
                    <td class="py-4">{{ __('Store') }}</td>
                    <td class="py-4">{{ __('Last Update') }}</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                @php $idx=0; @endphp
                @foreach ($category as $categoryUpdate)
                <tr class="{{ ($idx == 0) ? 'border-t-2' : '' }}">
                    <td class="p-4">{{ ($idx == 0) ? $categoryUpdate['category'] : '' }}</td>
                    <td class="py-4 text-center">{{ $categoryUpdate['product_totals'] }}</td>
                    <td class="py-4 text-center">{{ $categoryUpdate['store'] }}</td>
                    <td class="py-4 text-center">{{ $categoryUpdate['updated_at'] }}</td>
                </tr>
                @php $idx++; @endphp
                @endforeach
                @empty
                <tr>
                    <td colspan="6" class="py-4 text-center">
                        {{ __('No available categories in the system') }}
                    </td>
                </tr>
                @endforelse
                <tr class="border-t-2">
                    <td>&nbsp;</td>
                    <td class="py-4 text-center">{{ $totals }}</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </tbody>
        </table>

    </div>
</x-hiper-precios-layout>
