<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::group(['prefix' => 'foods'], function() {
        Route::get('/', [\App\Http\Controllers\Admin\FoodController::class, 'index'])->name('admin.foods.index');
        Route::get('/create', function() {
            return view('admin.foods.create');
        })->name('admin.foods.create');
        Route::post('/', [\App\Http\Controllers\Admin\FoodController::class, 'store'])->name('admin.foods.store');
        Route::get('/{id}/edit', [\App\Http\Controllers\Admin\FoodController::class, 'edit'])->name('admin.foods.edit');
        Route::put('/{id}', [\App\Http\Controllers\Admin\FoodController::class, 'update'])->name('admin.foods.update');
        Route::delete('/{id}', [\App\Http\Controllers\Admin\FoodController::class, 'destroy'])->name('admin.foods.destroy');
    });
});

Route::group(['prefix' => 'foods'], function() {
    Route::get('/', [\App\Http\Controllers\FoodController::class, 'index'])->name('foods.index');
    Route::get('/{id}', [\App\Http\Controllers\FoodController::class, 'show'])->name('foods.show');
});

Route::group(['prefix' => 'transactions'], function() {
    Route::get('/carts', [\App\Http\Controllers\TransactionController::class, 'carts'])->name('transactions.carts');
    Route::get('/checkout', function() {
        return view('transactions.checkout');
    });
    Route::post('/checkout', [\App\Http\Controllers\TransactionController::class, 'checkout'])->name('transactions.checkout');
    Route::get('/receipt', [\App\Http\Controllers\TransactionController::class, 'receipt'])->name('transactions.receipt');
});

Auth::routes();

