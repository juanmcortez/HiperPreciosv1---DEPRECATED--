<?php

use App\Http\Controllers\Stores\StoreController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('stores')->name('store')->group(function () {
    Route::get('', [StoreController::class, 'index']);
    Route::get('/new', [StoreController::class, 'create'])->name('.create');
    Route::post('/new', [StoreController::class, 'store'])->name('.store');
    Route::get('/{store}/edit', [StoreController::class, 'edit'])->name('.edit');
    Route::post('/{store}/edit', [StoreController::class, 'update'])->name('.update');
    Route::delete('/{store}/remove', [StoreController::class, 'destroy'])->name('.remove');
});
