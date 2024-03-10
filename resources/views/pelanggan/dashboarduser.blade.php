
<x-app-layout>
    <x-slot name="header">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Menu') }}
        </h2>
        @php
            $user_id = Auth::id();

            // Mengambil data keranjang dari Session
            $cart = Session::get('cart', []);

            // Menghitung total item dalam keranjang
            $totalCartItems = count($cart);
        @endphp
        <form action="{{ route('showOrders', ['user_id' => $user_id]) }}" method="GET" class="float-right -mt-5">
    @csrf
    <button type="submit" class="flex items-center">
        <img src="{{ asset('logo/struk.png') }}" alt="Cart Logo" class="w-6 h-6 mr-2">
        Transaksi
    </button>
</form>










        <div class="float-right -mt-5 mr-7">
            <a href="{{ route('viewCart') }}" class="flex items-center">
                <img src="{{ asset('logo/keranjang.png') }}" alt="Cart Logo" class="w-6 h-6 mr-2">
                Keranjang (<span class="total-cart-items">{{ $totalCartItems }}</span>)
            </a>
        </div>

        <script>
            $(document).ready(function () {
                let cartItems = localStorage.getItem('cartItems');
                if (cartItems) {
                    let totalCartItems = Object.keys(JSON.parse(cartItems)).length;
                    console.log('Total Cart Items:', totalCartItems);

                    $('.total-cart-items').text(totalCartItems);
                } else {
                    console.log('Cart is empty');
                }
            });
        </script>
    </x-slot>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Minuman Shop</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
        <!-- Tailwind CSS -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <body class="font-sans bg-gray-100">

        <div class="container mx-auto mt-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($minuman as $item)
                <div class="max-w-sm rounded overflow-hidden shadow-lg transition-transform duration-300 transform hover:scale-105">
                    <div class="w-full">
                        @if($item->foto)
                            <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $item->foto) }}" alt="Foto">
                        @else
                            <img class="w-full h-48 object-cover" src="https://via.placeholder.com/300" alt="Placeholder Image">
                        @endif
                    </div>
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">{{ $item->nama }}</div>
                        <p class="text-gray-700 text-base">{{ $item->keterangan }}</p>
                        <p class="text-gray-800 text-lg font-bold mt-2">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                        <!-- Tombol Pesan Sekarang -->
                        <form action="{{ route('addToCart') }}" method="POST" class="mt-4">
    @csrf
    <input type="hidden" name="product_id" value="{{ $item->id }}">
    <input type="number" name="quantity" value="1" min="1">
    <button type="submit" class="block text-center bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Add To Cart</button>
</form>

                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Include jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>

        // Inisialisasi $totalCartItems dengan nilai awal 0
    let $totalCartItems = 0;

// Fungsi untuk memperbarui jumlah item di keranjang
function updateCartItemsCount() {
    let cartItems = localStorage.getItem('cartItems');
    if (cartItems) {
        $totalCartItems = Object.keys(JSON.parse(cartItems)).length;
        console.log('Total Cart Items:', $totalCartItems);

        // Memperbarui tampilan jumlah item di tautan Keranjang
        $('.total-cart-items').text($totalCartItems);
    } else {
        console.log('Cart is empty');
    }
}

// Panggil fungsi pertama kali saat halaman dimuat
$(document).ready(function () {
        // Fungsi untuk menambahkan item ke keranjang
        function addToCart(productId, productName, productFoto, productHarga) {
            // Ambil informasi produk dari elemen atau backend jika diperlukan
            // Simpan informasi produk ke dalam localStorage
            let cartItems = localStorage.getItem('cartItems') ? JSON.parse(localStorage.getItem('cartItems')) : {};
            let totalPrice = localStorage.getItem('totalPrice') ? parseFloat(localStorage.getItem('totalPrice')) : 0;

            if (!cartItems[productId]) {
                cartItems[productId] = {
                    'nama': productName,
                    'foto': productFoto,
                    'harga': parseFloat(productHarga), // Ubah ke float agar harga diinterpretasikan dengan benar
                    'quantity': 0
                };
            }

            cartItems[productId].quantity++;
            totalPrice += parseFloat(productHarga); // Tambahkan harga produk yang ditambahkan ke total harga

            localStorage.setItem('cartItems', JSON.stringify(cartItems));
            localStorage.setItem('totalPrice', totalPrice.toFixed(2)); // Simpan total harga dengan dua angka desimal

            // Tampilkan informasi di konsol untuk debug
            console.log('Updated cartItems:', cartItems);
            console.log('Updated totalPrice:', totalPrice.toFixed(2));
        }

        $('.add-to-cart-btn').on('click', function () {
            let productId = $(this).attr('data-product-id');
            let productName = $(this).attr('data-product-name');
            let productFoto = $(this).attr('data-product-foto');
            let productHarga = $(this).attr('data-product-harga');

            addToCart(productId, productName, productFoto, productHarga);
        });
    });

    </script>



    </body>

    </html>

</x-app-layout>
