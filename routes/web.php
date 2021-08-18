<?php

use App\Http\Controllers\ImportController;
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

Route::get('stores', [StoreController::class, 'index'])->name('store');
Route::get('stores/{store}/edit', [StoreController::class, 'edit'])->name('store.edit');
Route::post('stores/{store}/edit', [StoreController::class, 'update'])->name('store.update');
Route::delete('stores/{store}/remove', [StoreController::class, 'destroy'])->name('store.remove');

// Route::get('products/import', [ImportController::class, 'index']);
