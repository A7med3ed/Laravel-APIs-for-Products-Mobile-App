<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('/signup', [RegisterController::class, 'signup']);
Route::post('/login', [RegisterController::class, 'login']);
Route::post('/cafes', [CafeController::class, 'store']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/products/{cafeName}', [ProductController::class, 'getProductByCafeName']);
Route::get('/cafes/by-product/{productName}', [CafeController::class, 'getCafesByProductName']);
Route::get('/allProducts', [ProductController::class, 'index']);
Route::get('/allCafes', [CafeController::class, 'index']);