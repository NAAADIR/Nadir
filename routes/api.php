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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('bedroom', App\Http\Controllers\BedroomController::class);

Route::apiResource('bedroom-type', App\Http\Controllers\BedroomTypeController::class);

Route::apiResource('benefit', App\Http\Controllers\BenefitController::class);

Route::apiResource('benefit-price', App\Http\Controllers\BenefitPriceController::class);

Route::apiResource('booking', App\Http\Controllers\BookingController::class);

Route::apiResource('guest', App\Http\Controllers\GuestController::class);

Route::apiResource('hotel', App\Http\Controllers\HotelController::class);

Route::apiResource('hotel-class', App\Http\Controllers\HotelClassController::class);

Route::apiResource('payment', App\Http\Controllers\PaymentController::class);

Route::apiResource('payment-type', App\Http\Controllers\PaymentTypeController::class);




Route::apiResource('bedroom', App\Http\Controllers\BedroomController::class);

Route::apiResource('bedroom-type', App\Http\Controllers\BedroomTypeController::class);

Route::apiResource('benefit', App\Http\Controllers\BenefitController::class);

Route::apiResource('benefit-price', App\Http\Controllers\BenefitPriceController::class);

Route::apiResource('booking', App\Http\Controllers\BookingController::class);

Route::apiResource('hotel', App\Http\Controllers\HotelController::class);

Route::apiResource('hotel-class', App\Http\Controllers\HotelClassController::class);

Route::apiResource('payment', App\Http\Controllers\PaymentController::class);

Route::apiResource('payment-type', App\Http\Controllers\PaymentTypeController::class);
