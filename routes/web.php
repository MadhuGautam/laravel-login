<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\Hotel\HotelController;
use App\Http\Controllers\RoomController;
Use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->middleware('auth');

// Route::post('/room', 'RoomController@index');
Auth::routes();

Route::get('/home', [HomeController::class,'index'])->name('home')->middleware('auth');

Route::group(['middleware' => ['auth', 'adminauth']], function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    //Route::view('/admin','admin/index')->name('admin');
});

Route::group(['middleware' => ['auth', 'managerauth']], function(){

    Route::get('/manager', [ManagerController::class,'index'])->name('manager');
    Route::get('/dashboard', [ManagerController::class, 'index'])->name('dashboard');
});

Route::resource('employee', 'EmployeeController');
// Route::get('/employee', 'EmployeeController@index')->name('employee');
// Route::get('/hotel', 'HotelController@index')->name('hotel');
//Route::get('/hotel/{hotel}/edit', 'HotelController@show');
Route::resource('hotel','HotelController');
Route::resource('hotel/{hotelId}/room','RoomController');
Route::resource('/hotel/{hotelId}/room/{roomId}/book','BookingController');
Route::get('/hotel/{hotelId}/room/{roomId}/bookedDate/{bookingDate}', 'BookingController@index')->name('booking')->middleware('auth');
Route::resource('accounts','AccountController');
Route::get('/bookings','BookingController@details');
Route::get('/customers','questController@details');

//Auth::routes(['verify' => true]);

// Route::namespace('Admin\Hotel')->group(function () {
//     Route::resource('hotel', 'HotelController');
//     Route::prefix('hotel')->name('hotel.')->group(function () {
//         // Route::resource('gallery', 'HotelGalleryController');
//         Route::resource('room', 'RoomController');
//         // Route::resource('room/gallery', 'RoomGalleryController');
//     });
// });

Route::get('ajax',function() {
    return view('hotels/description');
 })->middleware('auth');

 Route::post('getmsg', 'RoomController@index')->name('getmsg.post');
//Route::post('/getmsg/{id}','RoomController@index')->middleware('auth');

//Route::get('/hotel/{hotelId}/room/{roomId}/{bookId}','BookingController@index')->middleware('auth');

// Route::get('/hotel/{hotelId}/room/{roomId}','BookingController@add')->middleware('auth');
// Route::post('/hotel/{hotelId}/room/{roomId}','BookingController@store')->middleware('auth');

Route::get('/verify','RegisterController@verifyuser')->name('verify.user');
