<?php

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

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CarrinhoController;

Route::get('/', [ProductController::class, 'index']);
Route::get('/products/create', [ProductController::class, 'create'])->middleware('auth');
Route::get('/products/category', [ProductController::class, 'create_category'])->middleware('auth');
Route::post('/produts', [ProductController::class, 'store'])->middleware('auth');
Route::post('/produts_category', [ProductController::class, 'store_category'])->middleware('auth');
Route::get('/dashboard', [ProductController::class, 'dashboard'])->middleware('auth');
Route::get('/produts/edit/{id}', [ProductController::class, 'edit'])->middleware('auth');
Route::put('/produts/update/{id}', [ProductController::class, 'update'])->middleware('auth');
Route::delete('/produts/{id}', [ProductController::class, 'destroy'])->middleware('auth');
Route::get('/products/show/{id}', [ProductController::class, 'show']);


// Rota do carrinho de compra
Route::post('cliente/carrinho/{id}', [CarrinhoController::class, 'add'])->middleware('auth');

/*Route::get('/', function () {
    return view('welcome');
});/*

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/
