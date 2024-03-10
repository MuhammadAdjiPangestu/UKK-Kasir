<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transaction Report') }}
        </h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Transaction Report</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tanggal Transaksi</th>
                    <th>Metode Pembayaran</th>
                    <th>Total Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($details as $detail)
                    <tr>
                        <td>{{ $detail->order_id }}</td>
                        <td>{{ $detail->waktu_pembayaran }}</td>
                        <td>{{ $detail->tipe_pembayaran }}</td>
                        <td>{{ $detail->total_bayar }}</td>
                        <td>
                            <a class="btn btn-success" href="{{ url("testpdf/$detail->order_id") }}">Download PDF</a>
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2 text-black-600" onclick="window.location='{{ route('orderDetail', $detail->order_id) }}'">Lihat Detail Transaksi</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No order details available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
