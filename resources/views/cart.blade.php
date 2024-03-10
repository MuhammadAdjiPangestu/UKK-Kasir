<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Keranjang Belanja') }}
        </h2>
    </x-slot>

    <div class="py-4">
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 text-left">
            <thead>
                <tr class="bg-gray-100 dark:bg-gray-700">
                    <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700">Produk</th>
                    <th class="py-2 px-4 border-b border-gray-300 dark:border-gray-700">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cartItems as $item)
                    <tr class="border-b border-gray-300 dark:border-gray-700">
                        <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700">{{ $item->product->name }}</td>
                        <td class="py-2 px-4 border-b border-gray-300 dark:border-gray-700">{{ $item->quantity }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="py-2 px-4 text-center">Keranjang belanja kosong.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <form action="{{ route('checkout') }}" method="post" class="mt-4">
            @csrf
            <button type="submit" class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-700">
                Checkout
            </button>
        </form>
    </div>
</x-app-layout>
