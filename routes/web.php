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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('profile/{id}', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');


Route::get('/{id}/playlist', [App\Http\Controllers\PlaylistController::class, 'goPlaylist'])->name('playlist');
Route::get('/playmusic', 'PlaylistController@sendData')->name('footer');

// // social login
Route::get('login/social/{provider}', [App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider'])->name('login.social');
Route::get('social/{provider}/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback'])->name('register.social.callback');



