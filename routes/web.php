<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'listFeature'])->name('home');
Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


// social login
Route::get('social/{provider}/callback', [App\Http\Controllers\Auth\RegisterController::class, 'callbackRegister'])->name('register.social.callback');
Route::get('register/social/{provider}', [App\Http\Controllers\Auth\RegisterController::class, 'redirectRegisterProvider'])->name('register.social');
Route::get('login/social/{provider}', [App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider'])->name('login.social');

Route::get('/{id}/playlist', [App\Http\Controllers\PlaylistController::class, 'goPlaylist'])->name('playlist');



