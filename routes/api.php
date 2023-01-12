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
    Route::post('register', [\App\Http\Controllers\Api\V1\RegisterController::class, 'register'])->name('register');
    Route::post('login', [\App\Http\Controllers\Api\V1\RegisterController::class, 'login'])->name('login'); 
});


// Route CRUD côté API avec les droits effectué dans les policies.

Route::group(['prefix' => 'v1', 'middleware' => ['auth:api']], function (){

    Route::apiResource('bedrooms', App\Http\Controllers\Api\V1\BedroomController::class);
    Route::apiResource('bedroom-types', App\Http\Controllers\Api\V1\BedroomTypeController::class);
    Route::apiResource('benefits', App\Http\Controllers\Api\V1\BenefitController::class);
    Route::apiResource('benefit-prices', App\Http\Controllers\Api\V1\BenefitPriceController::class);
    Route::apiResource('bookings', App\Http\Controllers\Api\V1\BookingController::class);
    Route::apiResource('hotels', App\Http\Controllers\Api\V1\HotelController::class);
    Route::apiResource('hotel-class', App\Http\Controllers\Api\V1\HotelClassController::class);
    Route::apiResource('payments', App\Http\Controllers\Api\V1\PaymentController::class);
    Route::apiResource('payment-types', App\Http\Controllers\Api\V1\PaymentTypeController::class);
    Route::apiResource('addresses', App\Http\Controllers\Api\V1\AddressController::class);
    Route::apiResource('countries', App\Http\Controllers\Api\V1\CountryController::class);
    Route::get('/send-email', [App\Http\Controllers\Api\V1\UserController::class, 'sendEmail']);
});

// Route pour effectuer des recherches en fonction du nom et etc.. voir méthode du controlleur 

Route::get('hotels/search', [App\Http\Controllers\Api\V1\HotelController::class, 'search']);
Route::get('bedrooms/search', [App\Http\Controllers\Api\V1\BedroomController::class, 'search']); 


