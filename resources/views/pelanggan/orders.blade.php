<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaksi') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-semibold mb-4">Transaksi Kamu : </h1>

        @forelse($orders as $order)
            <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-4 p-4">
                <p class="text-gray-600">ID: {{ $order->id }}</p>
                <p class="text-gray-600">Tanggal Transaksi: {{ $order->tanggal_transaksi }}</p>
                <p class="text-gray-600">Metode Pembayaran: {{ $order->metode_pembayaran }}</p>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2 text-black-600" onclick="window.location='{{ route('orderDetail', $order->id) }}'">Lihat Detail Transaksi</button>

                <hr class="my-2">

            </div>
        @empty
            <p class="text-gray-500">Kamu belum pernah memesan apapun.</p>
        @endforelse
    </div>
</x-app-layout>
