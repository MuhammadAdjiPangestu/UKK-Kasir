<?php

namespace App\Http\Controllers;

use App\Models\Minuman;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Notif;
use App\Models\Bukti_pembayaran;
use App\Models\detail_transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Midtrans\Config as MidtransConfig;
use Midtrans\Config;
use Illuminate\Support\Facades\Redirect;
use Midtrans\Snap;




class OrderController extends Controller
{

    public function __construct()
    {
        \Midtrans\Config::$serverKey    = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized  = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds        = config('services.midtrans.is3ds');
    }


    public function addToCart(Request $request)
{
    // Validate the input
    $request->validate([
        'product_id' => 'required|exists:minuman,id',
        'quantity' => 'required|integer|min:1',
    ]);

    // Retrieve authenticated user
    $user = Auth::user();

    // Find the product by its ID
    $product = Minuman::find($request->product_id);

    if (!$product) {
        // Handle the case where the product is not found
        return redirect()->route('dashboarduser')->with('error', 'Product not found');
    }

    // Calculate total price
    $totalPrice = $product->harga * $request->quantity;

    // Create or update the cart record
    $cartItem = Cart::updateOrCreate(
        ['user_id' => $user->id, 'product_id' => $request->product_id],
        ['quantity' => $request->quantity, 'harga' => $totalPrice] // Menyimpan harga total ke dalam field 'harga'
    );

    // Optionally, you can provide a success message
    return redirect()->route('dashboarduser')->with('success', 'Item added to cart successfully');
}


public function viewCart()
{
    // Retrieve authenticated user
    $user = auth()->user();

    // Get all cart items for the current user
    $cartItems = Cart::where('user_id', $user->id)->with('product')->get();

    // Calculate total price
    $totalPrice = $cartItems->sum(function ($cartItem) {
        return $cartItem->product->harga * $cartItem->quantity;
    });

    // Pass the cart items and total price to the view
    return view('pelanggan.cartview', compact('cartItems', 'totalPrice'));
}


public function callback(Request $request)
{
    $orderId = $request->order_id;
    $statusCode = $request->status_code;
    $grossAmount = $request->gross_amount;
    // $transaction_type = "$request->transaction_type";
    // $transaction_id = "$request->transaction_id";
    // $status_message = "$request->status_message";
    // $signature_key = "$request->signature_key";
    // $reference_id = "$request->reference_id";
    // $merchant_id = "$request->merchant_id";
    // $expiry_time = "$request->expiry_time";


    $serverKey = config('midtrans.server_key');
    $input = $orderId.$statusCode.$grossAmount.$serverKey;
    $hashed = openssl_digest($input, 'sha512');

    if($hashed == $request->signature_key){
            if($request->transaction_status == 'settlement'){
            $transaction = Order::where('id', $request->order_id)->first();
            if($transaction){
                $transaction->update(['status_payment' => 'SUCCESS']);
                $transaction->update(['metode_pembayaran' => $request->payment_type]);
                // $transaction = new Bukti_pembayaran();

                // $transaction->order_id = $request->order_id;
                // $transaction->tipe_pembayaran = $request->payment_type;
                // $transaction->status_pembayaran = $request->transaction_status;
                // $transaction->total_bayar = $request->gross_amount;
                // $transaction->waktu_pembayaran = $request->settlement_time;

                // // Add the new fields
                // $transaction->transaction_id = $request->transaction_id;
                // $transaction->status_message = $request->status_message;
                // $transaction->reference_id = $request->reference_id;
                // $transaction->merchant_id = $request->merchant_id;
                // $transaction->expiry_time = $$request->expiry_time;

                // $transaction->save();

                $transaction = new Notif();

                $transaction->transaction_type = $request->transaction_type;
                $transaction->transaction_time = $request->transaction_time;
                $transaction->transaction_status = $request->transaction_status;
                $transaction->transaction_id = $request->transaction_id;
                $transaction->status_message = $request->status_message;
                $transaction->status_code = $request->status_code;
                $transaction->signature_key = $request->signature_key;
                $transaction->settlement_time = $request->settlement_time;
                $transaction->reference_id = $request->reference_id;
                $transaction->payment_type = $request->payment_type;
                $transaction->order_id = $request->order_id;
                $transaction->merchant_id = $request->merchant_id;
                $transaction->issuer = $request->issuer;
                $transaction->gross_amount = $request->gross_amount;
                $transaction->fraud_status = $request->fraud_status;
                $transaction->expiry_time = $request->expiry_time;
                $transaction->currency = $request->currency;
                $transaction->acquirer = $request->acquirer;

                $transaction->save();




                return response()->json(['message' => 'Status pembayaran berhasil diperbarui'], 200);
            } else {
                return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
            }
        }  elseif ($request->transaction_status == 'deny' || $request->transaction_status == 'cancel' || $request->transaction_status == 'expire') {

            // $this->processDenyOrCancelOrExpire($orderId);
            // return redirect('/dashboarduser')->with('alert', 'transaksi berhasil.');
        }
    } else {
        return response()->json(['message' => 'Signature key is not valid'], 401);
    }
}

// private function processDenyOrCancelOrExpire($orderId)
//     {
//         $order = Order::where('id', $orderId)->first();
//         if ($order) {
//             $order->update(['status_payment' => 'failed']);
//             $order->update(['status_transaction' => 'failed']);
//         }
//     }


    public function showOrderForm()
    {
        // Ambil data minuman dari database
        $minuman = Minuman::all();

        return view('order.form', compact('minuman'));
    }

    public function placeOrder(Request $request)
{
    // Validate the request
    $user = Auth::user();

    $validator = Validator::make($request->all(), [
        'user_id' => 'required|exists:users,id',
    ]);

    // Check if the validation fails
    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 422);
    }

    // Retrieve authenticated user
    $user = User::find($request->user_id);

    $cartItems = Cart::where('user_id', $user->id)->get();

    // Calculate total price
    $totalPrice = $cartItems->sum('harga');

    // Ensure total price is greater than or equal to 0.01
    if ($totalPrice < 0.01) {
        return response()->json(['error' => 'Total price must be greater than or equal to 0.01'], 422);
    }

    // Use database transaction for atomicity
    DB::beginTransaction();

    try {
        // Create a new order
        $order = new Order();
        $order->user_id = $user->id;
        $order->tanggal_transaksi = now();
        $order->metode_pembayaran = 'Tunai';
        $order->save();

        // Create detail_transaksi records for each cart item
        foreach ($cartItems as $cartItem) {
            // Retrieve product for the current cart item
            $product = Minuman::find($cartItem->product_id);

            $detailTransaksi = new detail_transaksi();
            $detailTransaksi->quantity = $cartItem->quantity;
            $detailTransaksi->harga = $cartItem->harga;
            $detailTransaksi->user_id = $user->id;
            $detailTransaksi->order_id = $order->id;
            $detailTransaksi->product_id = $cartItem->product_id;
            $detailTransaksi->save();

            // Add item details for midtrans payload
            $payload['item_details'][] = [
                'id'            => $cartItem->product_id,
                'price'         => $product->harga,
                'quantity'      => $cartItem->quantity,
                'name'          => $product->nama
            ];
        }

        // Delete all cart items for the current user
        Cart::where('user_id', $user->id)->delete();

        // Commit the transaction
        DB::commit();

        // midtrans
        $payload = [
            'transaction_details' => [
                'order_id'     => $order->id,
                'gross_amount' => $totalPrice,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email'      => $user->email,
            ],
            'item_details' => $payload['item_details'], // Add item details
        ];
        $snapToken = \Midtrans\Snap::getSnapToken($payload);
        $order->snap_token = $snapToken; // Assign the snap token to the order
        $order->save(); // Save the order with the snap token
        $midtransPaymentUrl = 'https://app.sandbox.midtrans.com/snap/v3/redirection/' . $snapToken;
        return Redirect::away($midtransPaymentUrl);
        return redirect('/dashboarduser')->with('alert', 'transaksi berhasil.');
        // return view('pelanggan.cartview', compact('cartItems', 'totalPrice', 'snapToken'))
        //     ->with('success', 'Order placed successfully');
    } catch (\Exception $e) {
        // Handle exceptions...

        // If an exception occurs, make sure to redirect or handle the error appropriately
        return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
    }
}

public function showDetail($order_id)
{
    // Ambil detail transaksi berdasarkan order_id
    $detail_transaksi = detail_transaksi::where('order_id', $order_id)->with('product')->get();

    // Hitung total harga
    $totalPrice = $detail_transaksi->sum(function ($detail) {
        return $detail->harga;
    });

    $bukti_pembayaran = Bukti_pembayaran::where('order_id', $order_id)->with('notif')->first();


    return view('pelanggan.detail_transaksi', compact('detail_transaksi', 'totalPrice', 'bukti_pembayaran'));
}

public function showNotif($order_id)
    {
        // Ambil data Bukti_pembayaran berdasarkan order_id
        $bukti_pembayaran = Bukti_pembayaran::where('order_id', $order_id)->first();

        // Inisialisasi total_bayar dengan null
        $total_bayar = null;

        if ($bukti_pembayaran) {
            // Jika ada Bukti_pembayaran, set total_bayar sesuai dengan nilai total_bayar dari model
            $total_bayar = $bukti_pembayaran->total_bayar;
        }

        // Kemudian kirimkan data ke view
        return view('minuman.transaction', [
            'order_id' => $order_id,
            'total_bayar' => $total_bayar,
        ]);
    }




public function showOrders($user_id)
    {
        // Ambil pesanan pengguna berdasarkan user_id
        $orders = Order::where('user_id', $user_id)->get();
        return view('pelanggan.orders', compact('orders'));
    }

    // Fungsi untuk menampilkan detail pesanan
    public function show(Order $order)
    {
        // Ambil data pesanan sesuai dengan parameter yang diberikan
        // Di sini Anda dapat melakukan logika untuk menampilkan detail pesanan
        return view('order.detail', compact('order'));
    }





public function decrementQuantity($rowId)
{
    // Temukan item keranjang berdasarkan id
    $cartItem = Cart::find($rowId);

    if ($cartItem) {
        // Kurangi kuantitas
        if ($cartItem->quantity > 1) {
            $cartItem->quantity -= 1;

            // Hitung harga baru berdasarkan harga produk dan kuantitas baru
            $productPrice = $cartItem->product->harga;
            $cartItem->harga = $productPrice * $cartItem->quantity;

            // Simpan perubahan ke database
            $cartItem->save();

            // Redirect kembali ke halaman keranjang dengan pesan sukses
            return redirect()->back()->with('success', 'Quantity updated successfully');
        } else {
            // Jika kuantitas sudah 1, hapus item keranjang
            $cartItem->delete();

            // Redirect kembali ke halaman keranjang dengan pesan sukses
            return redirect()->back()->with('success', 'Item removed from cart successfully');
        }
    }

    // Jika item keranjang tidak ditemukan, redirect kembali dengan pesan error
    return redirect()->back()->with('error', 'Cart item not found');
}





public function incrementQuantity($rowId)
{
    // Temukan item keranjang berdasarkan id
    $cartItem = Cart::find($rowId);

    if ($cartItem) {
        // Kurangi kuantitas
        if ($cartItem->quantity >= 1) {
            $cartItem->quantity += 1;

            // Hitung harga baru berdasarkan harga produk dan kuantitas baru
            $productPrice = $cartItem->product->harga;
            $cartItem->harga = $productPrice * $cartItem->quantity;

            // Simpan perubahan ke database
            $cartItem->save();

            // Redirect kembali ke halaman keranjang dengan pesan sukses
            return redirect()->back()->with('success', 'Quantity updated successfully');
        } else {
            // Jika kuantitas sudah 1, hapus item keranjang
            $cartItem->delete();

            // Redirect kembali ke halaman keranjang dengan pesan sukses
            return redirect()->back()->with('success', 'Item removed from cart successfully');
        }
    }

    // Jika item keranjang tidak ditemukan, redirect kembali dengan pesan error
    return redirect()->back()->with('error', 'Cart item not found');
}

}
