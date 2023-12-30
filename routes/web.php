<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SalesController;
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

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::group(['middleware'=>['auth']], function ()
{
    Route::get('/', [AuthController::class, 'dashboard']);

    Route::get('/inventory', [InventoryController::class, 'index']);
    Route::post('/inventory', [InventoryController::class, 'add']);
    Route::post('/inventory_edit', [InventoryController::class, 'edit']);
    Route::delete('/inventory_hapus/{inventory}', [InventoryController::class, 'hapus']);
    Route::get('/inventory/{inventory}',[InventoryController::class, 'getajax']);

    Route::get('/purchase', [PurchaseController::class, 'index']);
    Route::get('/purchase_add', [PurchaseController::class, 'tambah']);
    Route::post('/purchase_add', [PurchaseController::class, 'add']);
    Route::delete('/purchase_hapus/{purchase}', [PurchaseController::class, 'hapus']);
    Route::get('/purchase_detail/{purchase}', [PurchaseController::class, 'detail']);
    Route::post('/purchase_detail_edit', [PurchaseController::class, 'detail_edit']);
    Route::get('/purchase_detail_hapus/{purchase}', [PurchaseController::class, 'detail_hapus']);

    Route::get('/sales', [SalesController::class, 'index']);
    Route::get('/sales_add', [SalesController::class, 'tambah']);
    Route::post('/sales_add', [SalesController::class, 'add']);
    Route::delete('/sales_hapus/{sales}', [SalesController::class, 'hapus']);
    Route::get('/sales_detail/{sales}', [SalesController::class, 'detail']);
    Route::post('/sales_detail_edit', [SalesController::class, 'detail_edit']);
    Route::get('/sales_detail_hapus/{sales}', [SalesController::class, 'detail_hapus']);
});
