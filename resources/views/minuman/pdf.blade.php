<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaction Report') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Transaction Report</h1>

        <!-- Check if $order is defined before generating the link -->
        @if(isset($order))
            <a href="{{ route('generatePdf', ['order_id' => $order->id]) }}">Generate PDF</a>
        @endif

        @forelse($details as $detail)
            <div class="mt-4 border border-gray-300 dark:border-gray-700 p-4">
                <p><strong>ID:</strong> {{ $detail->order_id }}</p>
                <p><strong>Tanggal Transaksi:</strong> {{ $detail->tanggal_transaksi }}</p>
                <p><strong>Metode Pembayaran:</strong> {{ $detail->metode_pembayaran }}</p>
                <hr class="my-2">
            </div>
        @empty
            <p class="text-gray-500 mt-4">No details found.</p>
        @endforelse
    </div>
</x-app-layout>
