<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MinumanController;
use App\Models\Minuman;
use App\Models\Order;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $minuman = Minuman::all();
    return view('dashboardpelanggan', compact('minuman'));
})->name('dashboardpelanggan');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//pelangganindex
Route::get('dashboarduser', function () {
    $minuman = Minuman::all();
    return view('pelanggan.dashboarduser', compact('minuman'));
})->middleware(['auth', 'verified'])->name('dashboarduser');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// DATA MINUMAN
Route::get('/data-minuman', function () {
    $minuman = Minuman::all();
    return view('minuman.index', compact('minuman'));

})->name('minuman.index');
// ADD minuman
Route::get('/add-minuman', function () {
    return view('minuman.create');
})->name('minuman.create');
Route::post('/add-minuman', [MinumanController::class, 'add_minuman'])->name('add.minuman');
// UPDATE minuman
Route::get('/select-minuman/{id}', [MinumanController::class, 'select'])->name('dontol.dontol');
Route::post('/update-minuman/{id}', [MinumanController::class, 'update_minuman'])->name('update.minuman');
// DELETE minuman
Route::delete('/select-delete-minuman/{id}', [MinumanController::class, 'delete_minuman'])->name('delete.minuman');
require __DIR__.'/auth.php';

// DATA USER
Route::get('/data-user', [UserController::class, 'index'])->name('user.index');

// ADD USER
Route::get('/add-user', [UserController::class, 'create'])->name('user.create');
Route::post('/admin/users', [UserController::class, 'store'])->name('admin.user.store');

// UPDATE USER
Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('edit.user');
Route::post('/update-user/{id}', [UserController::class, 'update'])->name('update.user');

// DELETE USER
Route::delete('/select-delete-user/{id}', [UserController::class, 'destroy'])->name('delete.user');

// Authentication routes (if not already included in auth.php)
require __DIR__.'/auth.php';

//keranjang
Route::post('/add-to-cart', [OrderController::class, 'addToCart'])->name('addToCart');
Route::get('/cart/decrement/{rowId}', [OrderController::class, 'decrementQuantity'])->name('cart.decrement');
Route::get('/cart/increment/{rowId}', [OrderController::class, 'incrementQuantity'])->name('cart.increment');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('order.detail');
Route::get('/view-cart', [OrderController::class, 'viewCart'])->name('viewCart');
Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('place.order');
Route::get('/showOrders/{user_id}', [OrderController::class, 'showOrders'])->name('showOrders');
Route::get('/order/{order}', [OrderController::class, 'showDetail'])->name('orderDetail');



Route::get('/orders/{id}', [OrderController::class, 'showOrders'])->name('orders');
Route::get('/order-confirmation', [OrderController::class, 'showOrderConfirmation'])->name('order-confirmation');

// update cart
Route::post('/update-quantity/{rowId}/{action}', [OrderController::class, 'updateQuantity'])->name('updateQuantity');

Route::get('/order-confirmation', function () {
    // Add your logic for the order confirmation page here
    return view('order.confirmation');
})->name('order-confirmation');

Route::get('/order-confirmation', [OrderController::class, 'showOrderConfirmation'])->name('order-confirmation');

Route::post('/callback', [OrderController::class, 'callback'])->name('callback');

//pdf
// Define a route for generating PDFs based on order ID
// Route::get('/generate-pdf/{order_id}', [TransactionController::class, 'generatePdf'])->name('generate-pdf');


// Define a route for listing transactions (assuming this route is for listing, not generating PDF)
Route::get('/admin/transactions', [TransactionController::class, 'index'])->name('transaction.index');

Route::get('/pdftest/{id}', [TransactionController::class, 'generatePdf'])->name('generatePdf');
Route::get('/testpdf/{id}', [TransactionController::class, 'testPDF'])->name('generatePdf');

