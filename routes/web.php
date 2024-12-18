<?php

use App\Http\Controllers\FrontEndController;
use Illuminate\Support\Facades\Route;



Route::get('/about',[FrontEndController::class,'about']);
Route::get('/cart',[FrontendController::class,'cart']);
Route::get('/checkout',[FrontendController::class,'checkout']);
Route::get('/',[FrontendController::class,'index']);
Route::get('/products',[FrontendController::class,'products']);
Route::get('/single_product/{id}',[FrontendController::class,'single_product'])->name('single_product');


// Route::get('/', function () {
//     return view('welcome');
// });
