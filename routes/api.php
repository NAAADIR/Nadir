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

// Route pour se connecter côté API avec Laravel Passport

Route::group(['prefix' => 'v1'], function (){
    Route::post('register', [\App\Http\Controllers\Api\RegisterController::class, 'register'])->name('register');
    Route::post('login', [\App\Http\Controllers\Api\RegisterController::class, 'login'])->name('login'); 
});


// Route CRUD côté API avec les droits effectué dans les policies.

Route::group(['prefix' => 'v1', 'middleware' => ['auth:api']], function (){

    Route::apiResource('bedrooms', App\Http\Controllers\Api\BedroomController::class);
    Route::apiResource('bedroom-types', App\Http\Controllers\Api\BedroomTypeController::class);
    Route::apiResource('benefits', App\Http\Controllers\Api\BenefitController::class);
    Route::apiResource('benefit-prices', App\Http\Controllers\Api\BenefitPriceController::class);
    Route::apiResource('bookings', App\Http\Controllers\Api\BookingController::class);
    Route::apiResource('hotels', App\Http\Controllers\Api\HotelController::class);
    Route::apiResource('hotel-class', App\Http\Controllers\Api\HotelClassController::class);
    Route::apiResource('payments', App\Http\Controllers\Api\PaymentController::class);
    Route::apiResource('payment-types', App\Http\Controllers\Api\PaymentTypeController::class);
    Route::apiResource('addresses', App\Http\Controllers\Api\AddressController::class);
    Route::apiResource('countries', App\Http\Controllers\Api\CountryController::class);
    Route::get('/send-email', [App\Http\Controllers\Api\UserController::class, 'sendEmail']);
});

// Route pour effectuer des recherches en fonction du nom et etc.. voir méthode du controlleur 

Route::get('hotels/search', [App\Http\Controllers\Api\HotelController::class, 'search']);
Route::get('bedrooms/search', [App\Http\Controllers\Api\BedroomController::class, 'search']); 


