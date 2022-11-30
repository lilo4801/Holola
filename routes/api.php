<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/auth/logout', \App\Http\Controllers\API\Auth\User\LogoutController::class);

});

Route::prefix('auth')->group(function () {
    Route::post('/register', \App\Http\Controllers\API\Auth\User\RegisterController::class);
    Route::post('/login', \App\Http\Controllers\API\Auth\User\LoginController::class);
});


Route::prefix('auth/admin')->group(function () {
    Route::post('/register', \App\Http\Controllers\API\Auth\Admin\CreateController::class);
    Route::post('/login', \App\Http\Controllers\API\Auth\User\LoginController::class);
});


Route::middleware('auth:admin')->group(function () {
    Route::get('/auth/admin/logout', \App\Http\Controllers\API\Auth\Admin\LogoutController::class);

    Route::get('/products', \App\Http\Controllers\API\Product\CreateController::class);

});
