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

Route::get('/products/create', [ProductController::class, 'create'])->middleware('auth');
Route::post('/produts', [ProductController::class, 'store'])->middleware('auth');
Route::get('/dashboard', [ProductController::class, 'dashboard'])->middleware('auth');
Route::get('/produts/edit/{id}', [ProductController::class, 'edit'])->middleware('auth');
Route::put('/produts/update/{id}', [ProductController::class, 'update'])->middleware('auth');


Route::get('/', function () {
    return view('welcome');
});

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/
