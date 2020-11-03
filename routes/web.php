<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\Hotel\HotelController;
use App\Http\Controllers\RoomController;

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
//    Route::view('/admin','admin/index')->name('admin');
});

Route::group(['middleware' => ['auth', 'managerauth']], function(){

    Route::get('/manager', [ManagerController::class,'index'])->name('manager');
    // Route::get('/dashboard', [ManagerController::class, 'index'])->name('dashboard');
});

Auth::routes();

Route::get('/employee', 'EmployeeController@index')->name('employee');
// Route::get('/hotel', 'HotelController@index')->name('hotel');
//Route::get('/hotel/{hotel}', 'HotelController@show')->name('hotel.show');
// Route::resource('hotel','HotelController');
// Route::resource('hotel/1/room','RoomController');
Route::view('/booking', 'booking/index')->name('booking');

//Auth::routes(['verify' => true]);

Route::namespace('Admin\Hotel')->group(function () {
    Route::resource('hotel', 'HotelController');
    Route::prefix('hotel')->name('hotel.')->group(function () {
        Route::resource('gallery', 'HotelGalleryController');
        Route::resource('room', 'RoomController');
        Route::resource('room/gallery', 'RoomGalleryController');
    });
});

Route::get('ajax',function() {
    return view('hotels/description');
 });
 Route::post('/getmsg','RoomController@index');
