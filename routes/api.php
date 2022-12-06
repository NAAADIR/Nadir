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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('bedroom', BedroomController::class);
Route::apiResource('bedroom-type', BedroomTypeController::class);
Route::apiResource('benefit', BenefitController::class);
Route::apiResource('benefit-price', BenefitPriceController::class);
Route::apiResource('booking', BookingController::class);
Route::apiResource('hotel', HotelController::class);
Route::apiResource('hotel-class', HotelClassController::class);
Route::apiResource('payment', PaymentController::class);
Route::apiResource('payment-type', PaymentTypeController::class);



