<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

Route::middleware(['auth','verified'])->group(function() {
    Route::name('books.')->group(function() {
        Route::get('/', [BookController::class, 'index'])->name('index');
        Route::prefix('books')->group(function() {
            Route::get('/{id}', [BookController::class, 'showBook'])->name('single');
            Route::post('/', [BookController::class, 'storeBook'])->name('store');
            Route::delete('/{id}', [BookController::class, 'deleteBook'])->name('delete');
        });
    });

    Route::name('customers.')->prefix('customers')->group(function() {
        Route::get('/', [CustomerController::class, 'index'])->name('index');
        Route::post('/', [CustomerController::class, 'store'])->name('store');
        Route::get('/{id}', [CustomerController::class, 'show'])->name('show');
        Route::post('/checkout/{bookId}', [CustomerController::class, 'checkoutBook'])->name('checkout');
        Route::post('/{customerId}/checkin/{bookId}', [CustomerController::class, 'checkinBook'])->name('checkin');
    });
});

Route::fallback(function(){
    return view('404');
});

require __DIR__.'/auth.php';
