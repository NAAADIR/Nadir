<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\BedroomController;
use App\Http\Controllers\Api\BenefitController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\HotelClassController;
use App\Http\Controllers\Api\BedroomTypeController;
use App\Http\Controllers\Api\PaymentTypeController;
use App\Http\Controllers\Api\BenefitPriceController;

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

Route::group(['prefix' => 'v1'], function (){
    Route::post('register', [\App\Http\Controllers\Api\RegisterController::class, 'register'])->name('register');
    Route::post('login', [\App\Http\Controllers\Api\RegisterController::class, 'login'])->name('login');
    
    
});

Route::group(['prefix' => 'v1', 'middleware' => ['auth:api']], function (){

    Route::apiResource('bedrooms', BedroomController::class);
    Route::apiResource('bedroom-types', BedroomTypeController::class);
    Route::apiResource('benefits', BenefitController::class);
    Route::apiResource('benefit-prices', BenefitPriceController::class);
    Route::apiResource('bookings', BookingController::class);
    Route::apiResource('hotels', HotelController::class);
    Route::apiResource('hotel-class', HotelClassController::class);
    Route::apiResource('payments', PaymentController::class);
    Route::apiResource('payment-types', PaymentTypeController::class);
    Route::apiResource('address', App\Http\Controllers\AddressController::class);
    Route::apiResource('country', App\Http\Controllers\CountryController::class);
});


