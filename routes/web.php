<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\back\ShowController;
use App\Http\Controllers\back\AddController;
use App\Http\Controllers\back\DeleteController;

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



Route::middleware(['login'])->prefix('admin')->group(function () {
  
  Route::get('/products',[ShowController::class,'products'])->name('products');
  //back get
  Route::get('/deleteProduct/{id}',[DeleteController::class,'deleteProduct'])->name('deleteProduct');
  //Post routes

Route::post('addproduct',[AddController::class,'addProduct'])->name('addProduct');
  
});
