<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user/{user}/edit',[App\Http\Controllers\UserController::class,'edit'])->name('user.edit');
Route::patch('/user/{user}/update',[App\Http\Controllers\UserController::class,'update'])->name('user.update');
Route::get('/user/list',[App\Http\Controllers\UserController::class,'index'])->name('user.index');
Route::post('user/{id}/delete', [App\Http\Controllers\UserController::class,'destroy'])->name('user.delete');
//Route::resource('user', App\Http\Controllers\UserController::class);

//Route::get('/user/list', 'UserController@index')->name('index');
//Route::post('user/delete/{id}', 'UserController@destroy')->name('user.delete')->middleware('role:admin');
//Route::resource('user', 'UserController')->middleware('role:admin');
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
