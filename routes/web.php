<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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
    return view('auth_new.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::resource('/user', UserController::class);

    Route::resource('/barang', BarangController::class);

    Route::resource('/supplier', SupplierController::class);

    Route::get('/transaction', [TransactionController::class, 'index']);

    Route::get('/transaction/{transaction}', [TransactionController::class, 'show']);

    Route::delete('/transaction/{transaction}', [TransactionController::class, 'destroy']);
});

require __DIR__ . '/auth.php';
