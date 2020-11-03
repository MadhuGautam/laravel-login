<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controller\AuthController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
//Route::resource('hotel','HotelApiController');
Route::middleware('auth:api')->group(function () {
    // Route::resource('posts', 'PostController');
    Route::resource('hotel','HotelApiController');
    Route::resource('room','RoomApiController');
    Route::resource('booking','BookingApiController');
});


//Auth::routes();
