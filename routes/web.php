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
    return view('home');
})->middleware('auth');


Auth::routes();

Route::get('/home', [HomeController::class,'index'])->name('home')->middleware('auth');

Route::group(['middleware' => ['auth', 'adminauth']], function(){
   Route::get('/admin', [AdminController::class, 'index'])->name('admin');
//    Route::view('/admin','admin/index')->name('admin');
});

Route::group(['middleware' => ['auth', 'managerauth']], function(){

    Route::get('/manager', [ManagerController::class,'index'])->name('manager');

});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes(['verify' => true]);
