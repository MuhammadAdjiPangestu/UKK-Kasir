<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Order Confirmation') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <h1 class="text-2xl font-semibold mb-4">Order Placed Successfully</h1>

            <!-- Display order details here -->
            <div>
                <p>Thank you for your order! Here are the details:</p>

                <!-- Loop through order details if needed -->
                @foreach($orders as $order)
                    <div class="mt-4">
                        <p>Product: {{ $order->product->nama }}</p>
                        <p>Quantity: {{ $order->quantity }}</p>
                        <p>Total Price: Rp {{ number_format($order->total_harga) }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
