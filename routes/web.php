<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\HomeController;

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
    return view('welcome');
})->middleware('auth');


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
Route::get('/hotel', 'HotelController@index')->name('hotel');
//Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes(['verify' => true]);
