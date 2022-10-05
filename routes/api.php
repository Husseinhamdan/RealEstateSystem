<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\OwnerController;
use App\Http\Controllers\Api\UserController;
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

//----------------------- Auth Api -------------------------------------

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('/admin/register', 'registerAdmin');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});
//---------------------------------User Api--------------------------------------

Route::controller(UserController::class)->group(function () {
    Route::prefix('user')->group(function () {
        Route::post('store', 'store');
        Route::get('index', 'index');
        Route::get('show/{id}', 'show');
        Route::post('update/{id}', 'update');
        Route::delete('delete/{id}', 'destroy');

    });
});
//------------------------------------Customers Api------------------------------------------
Route::controller(CustomerController::class)->group(function () {
    Route::prefix('customer')->group(function () {
        Route::post('store', 'store');
        Route::get('index', 'index');
        Route::get('show/{id}', 'show');
        Route::post('update/{id}', 'update');
        Route::delete('delete/{id}', 'destroy');

    });
});

//--------------------------------------Owners Api--------------------------------------------
Route::controller(OwnerController::class)->group(function () {
    Route::prefix('owner')->group(function () {
        Route::get('index', 'index');
        Route::post('store', 'store');
        Route::get('show/{id}', 'show');
        Route::post('update/{id}', 'update');
        Route::delete('delete/{id}', 'destroy');

    });
});
