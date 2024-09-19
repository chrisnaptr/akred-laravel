<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AkreditasiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
    
  
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
  
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
  
Route::get('auth/register', function(){
    return view('auth/register');
});

Route::get('auth/login', function(){
    return view('auth/login');
});


Route::get('home', function(){
    return view('home');
});

Route::get('akreditasi/frontend', function(){
    return view('akreditasi/frontend');
});


//route resource
Route::resource('/akreditasi', \App\Http\Controllers\AkreditasiController::class);
