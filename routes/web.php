<?php

use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\ProductPurchaseController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::middleware(['auth'])->group(function () {
//    Route::resource('admin/products', ProductController::class);
//});

Route::group([], function () {
    Route::get('/products', [ProductPurchaseController::class, 'index'])->name('products');
    Route::get('/products/{product}/buy', [ProductPurchaseController::class, 'buy'])->name('product.buy');
    Route::post('/cart/add/{product}', [ProductPurchaseController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [ProductPurchaseController::class, 'cart'])->name('cart');
    Route::put('/cart/update/{product}', [ProductPurchaseController::class, 'updateCartItem'])->name('cart.update');
});


require __DIR__.'/auth.php';
