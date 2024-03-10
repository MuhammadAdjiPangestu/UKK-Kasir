<div class="container mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-4">Transaction Report</h1>

    @foreach($detail as $detail)
        <div class="mt-4 border border-gray-300 dark:border-gray-700 p-4">
            @forelse ($detail->details as $orderDetail)
            @if($loop->first)
                <h2 class="text-lg font-semibold mt-2 mb-2">Order Details</h2>
                <p class="mb-2"><strong>ID:</strong> {{ $orderDetail->order_id }}</p>
                <p class="mb-2"><strong>Tanggal Transaksi:</strong> {{ $detail->tanggal_transaksi }}</p>
                <p class="mb-2"><strong>Metode Pembayaran:</strong> {{ $detail->metode_pembayaran }}</p>
                @endif
        @empty
            <p>No order details available.</p>
        @endforelse
                    {{-- <p class="mb-2"><strong>Produk:</strong> {{ $orderDetail->product->nama }}</p> --}}
                    <table border="1">
                        <thead>
                            <tr>
                                <td>product</td>
                                <td>harga</td>
                                <td>quantity</td>
                                <td>total harga</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalHarga = 0;
                            @endphp
                            @forelse ($detail->details as $orderDetail)
                                <tr>
                                    <td>{{ $orderDetail->product->nama }}</td>
                                    <td>{{ $orderDetail->product->harga }}</td>
                                    <td>{{ $orderDetail->quantity }}</td>
                                    <td>{{ $orderDetail->harga }}</td>
                                </tr>
                                @php
                                    $totalHarga += $orderDetail->harga;
                                @endphp
                            @empty
                                <p>No order details available.</p>
                            @endforelse
                        </tbody>
                    </table>

                    <p class="mb-2"><strong>Total Bayar:</strong> Rp {{ $totalHarga }}</p>
                </div>


        </div>
    @endforeach
</div>
