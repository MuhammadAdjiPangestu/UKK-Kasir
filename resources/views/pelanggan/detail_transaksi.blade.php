<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Transaksi') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-semibold mb-4">Detail Transaksi: </h1>

        @forelse($detail_transaksi as $detail)
            <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-4 p-4">
                <p class="text-gray-600">Nama Minuman: {{ $detail->product->nama }}</p>
                <p class="text-gray-600">Quantity: {{ $detail->quantity }}</p>
                <p class="text-gray-600">Harga: Rp.{{ number_format($detail->harga, 0, ',', '.') }}</p>

                <hr class="my-2">
            </div>
        @empty
            <p class="text-gray-500">Detail transaksi tidak ditemukan.</p>
        @endforelse
    </div>

    @if($bukti_pembayaran)
    <div class="bg-white shadow overflow-hidden sm:rounded-lg p-4 mt-4">
        <p class="text-gray-600 font-semibold">Total Harga: Rp.{{ number_format($totalPrice, 0, ',', '.') }}</p>
        <p class="text-gray-600 font-semibold">Status Pembayaran: {{ $bukti_pembayaran->status_pembayaran}}</p>
        <p class="text-gray-600 font-semibold">Tipe Pembayaran: {{ $bukti_pembayaran->tipe_pembayaran}}</p>
    </div>
    @endif
    <div class="bg-white shadow overflow-hidden sm:rounded-lg p-4 mt-4">
            <p class="text-gray-600 font-semibold">Total Harga: Rp.{{ number_format($totalPrice, 0, ',', '.') }}</p>
        </div>
</x-app-layout>
