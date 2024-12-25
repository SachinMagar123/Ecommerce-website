<?php

use App\Http\Controllers\FrontEndController;
use Illuminate\Support\Facades\Route;



Route::get('/about',[FrontEndController::class,'about']);
Route::get('/cart',[FrontendController::class,'cart']);
Route::get('/checkout',[FrontendController::class,'checkout']);
Route::get('/',[FrontendController::class,'index']);
Route::get('/products',[FrontendController::class,'products']);
Route::get('/single_product/{id}',[FrontendController::class,'single_product'])->name('single_product');
Route::post('/add_to_cart',[FrontEndController::class,'add_to_cart'])->name('add_to_cart');
Route::post('/remove_from_cart',[FrontEndController::class,'remove_from_cart'])->name('remove_from_cart');
Route::post('/update_cart',[FrontEndController::class,'update_cart'])->name('update_cart');
Route::get('/checkout',[FrontEndController::class,'checkout'])->name('checkout');
Route::post('/place_order', [FrontEndController::class, 'place_order'])->name('place_order');


// Route::get('/', function () {
//     return view('welcome');
// });
