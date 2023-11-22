<?php

use App\Http\Controllers\DinerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KebabProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DinerReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;

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

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// index thru the home contoller
Route::get('/', [HomeController::class, "index"])->name('index');

// add route to add kebabShop to using resource controller
// Route::resource('kebabShop', 'App\Http\Controllers\KebabShop');

Route::resource('reviews', ReviewController::class);
Route::resource('dinerReviews', DinerReviewController::class);

// Route::get('/table', function () {
//     return view('table');
// })->name('table');

Route::get('/dashboard', function () {
    return redirect()->route('admin');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('shops', DinerController::class);
    Route::get('/users', [ProfileController::class, "index"])->name('users');
    Route::get('/shops/{kebabShop}/products', [KebabProductController::class, "index"])->name('shops.products.index');
    Route::post('/shops/{kebabShop}/products', [KebabProductController::class, "store"])->name('shops.products.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/table', [DinerController::class, "table"])->name('table');
    Route::get('/admin', function () {return view('admin');})->name('admin');
    Route::get('/map', [DinerController::class, "map"])->name('map');
});

Route::get('/logout', function () {
    return view('logout');
})->name('logout');

require __DIR__.'/auth.php';
