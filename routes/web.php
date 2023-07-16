<?php
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LoginController::class, 'index']);
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');
Route::get('/product', function () {
    return view('product');
});
Route::get('/404', function () {
    return view('404');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/feature', function () {
    return view('feature');
});
Route::get('/gallery', function () {
    return view('gallery');
});
Route::get('/service', function () {
    return view('service');
});
Route::get('/team', function () {
    return view('team');
});
Route::get('/testimonial', function () {
    return view('testimonial');
});


Route::get('register', [RegisterController::class, 'index']);
Route::post('register', [RegisterController::class, 'store']);

Route::get('login', [LoginController::class, 'index']);
Route::post('login', [LoginController::class, 'authenticate']);

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('about', [AboutController::class, 'index'])->name('about');

// Rute Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Rute Logout
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Rute Employees
Route::resources([
    'employees' => EmployeeController::class,
]);

// Rute Products
Route::resources([
    'products' => ProductController::class,
]);

// Rute Cart
Route::post('/carts/{product}', [CartController::class, 'store'])->name('carts.store');
Route::get('/carts', [CartController::class, 'show'])->name('carts.show');
Route::patch('/carts/{cart}', [CartController::class, 'update'])->name('carts.update');
Route::delete('/carts/{cart}', [CartController::class, 'destroy'])->name('carts.destroy');

// Rute Order
Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
Route::get('/print-orders', [OrderController::class, 'print']);

// Rute Transaction
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');


