<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\ShowController;
use App\Http\Controllers\Back\AddController;
use App\Http\Controllers\Back\DeleteController;
use App\Http\Controllers\Back\UpdateController;
use App\Http\Controllers\ImportOperationsController;
use App\Http\Controllers\Front\ResponseController;

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

Route::get('/', function(){
  return view('front.index');
})->name('index');

Route::post('barcode',[ResponseController::class,'barcodeQuery'])->name('barcodeQuery');
Route::post('finishHim',[ResponseController::class,'finish'])->name('asd');


Route::middleware(['login'])->prefix('admin')->group(function () {
  Route::get('/', function(){
    return view('back.home');
  })->name('home');
  Route::get('/productslist',[ShowController::class,'products'])->name('products');
  Route::get('/shoppinglist',[ShowController::class,'shopList'])->name('shoplist');

  Route::get('productadd', function(){
    return view('back.products');
  })->name('productAdd');
  //back get
  Route::get('/deleteProduct/{id}',[DeleteController::class,'deleteProduct'])->name('deleteProduct');
  Route::get('recordProduct',[ImportOperationsController::class,'recordsExport'])->name('recordsProduct');
  //Post routes

Route::post('addproduct',[AddController::class,'addProduct'])->name('addProduct');
Route::post('updateProduct/{id?}',[UpdateController::class,'updateProduct'])->name('updateProduct');
  
});
