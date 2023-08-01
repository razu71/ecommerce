<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('product')->controller(ProductController::class)->group(function (){
    Route::get('list','getAllProducts');
    Route::get('{id}','getSpecificProduct');
    Route::post('store','storeProduct');
    Route::patch('update/{id}','updateProduct');
    Route::put('photo/upload/{id}','uploadProductPhoto');
    Route::delete('delete/{id}','deleteProduct');
});
