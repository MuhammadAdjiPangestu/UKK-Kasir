<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Keranjang') }}
        </h2>
    </x-slot>
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
  <script type="text/javascript"
  src="https://app.stg.midtrans.com/snap/snap.js"
data-client-key="{{ config('midtrans.client_key') }}"></script>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-semibold mb-4">Keranjang Kamu :</h1>

        <div id="cartItemsContainer">
            @foreach($cartItems as $cartItem)
                <div class="flex items-center justify-between border-b py-4"
                    data-row-id="{{ $cartItem->id }}"
                    data-nama="{{ $cartItem->product->nama }}"
                    data-foto="{{ $cartItem->product->foto }}"
                    data-harga="{{ $cartItem->product->harga }}"
                    data-quantity="{{ $cartItem->quantity }}">
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 overflow-hidden rounded">
                            <img src="{{ $cartItem->product->foto }}" alt="{{ $cartItem->product->nama }}" class="h-20 w-20 object-cover rounded-md">
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold">{{ $cartItem->product->nama }}</h3>
                            <p class="text-gray-600">Quantity:
                            <button data-row-id="{{ $cartItem->id }}" class="increment-btn text-red-500 px-2" onclick="window.location.href='{{ route("cart.increment", $cartItem->id) }}'">+</button>
                                <span class="quantity">{{ $cartItem->quantity }}</span>
                                <button data-row-id="{{ $cartItem->id }}" class="decrement-btn text-red-500 px-2" onclick="window.location.href='{{ route("cart.decrement", $cartItem->id) }}'">-</button>
                            </p>
                        </div>
                    </div>

                    <span class="text-lg font-semibold">Rp {{ number_format($cartItem->product->harga * $cartItem->quantity) }}</span>
                </div>
            @endforeach
        </div>

        <!-- Summary and Place Order button -->
        <div class="mt-8">
    <div class="flex justify-between items-center">
        <p class="text-lg font-bold">Total : </p>
        <div class="flex justify-between items-center">
            <!-- Display total amount -->
            <p id="grossAmount" class="text-xl font-bold">Rp {{ number_format($totalPrice) }}</p>
        </div>
    </div>
</div>

<form method="POST" action="{{ route('place.order') }}">
    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <!-- other input fields or buttons -->
    <button type="submit" class="bg-blue-500 text-white py-3 px-6 rounded mt-4 hover:bg-blue-800 transition duration-300" id="pay-button">
        Pesan
    </button>
</form>


    </div>

    {{-- <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
          // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
          // Also, use the embedId that you defined in the div above, here.
          window.snap.embed('{{ $snapToken }}', {
            embedId: 'snap-container',
            onSuccess: function (result) {
              /* You may add your own implementation here */
              alert("payment success!"); console.log(result);
            },
            onPending: function (result) {
              /* You may add your own implementation here */
              alert("wating your payment!"); console.log(result);
            },
            onError: function (result) {
              /* You may add your own implementation here */
              alert("payment failed!"); console.log(result);
            },
            onClose: function () {
              /* You may add your own implementation here */
              alert('you closed the popup without finishing the payment');
            }
          });
        });
      </script> --}}

</x-app-layout>
