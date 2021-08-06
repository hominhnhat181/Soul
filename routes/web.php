<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;


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

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('profile/{id}', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');


// // social login
Route::get('login/social/{provider}', [App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider'])->name('login.social');
Route::get('social/{provider}/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback'])->name('register.social.callback');


// AJAX
Route::get('home/', [App\Http\Controllers\AjaxController::class, 'getArticles'])->name('home');


// Language
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);


// song
Route::get('/{id}/playlist', [App\Http\Controllers\PlaylistController::class, 'goPlaylist'])->name('playlist');
// Route::get('/{song}/playlist', [App\Http\Controllers\PlaylistController::class, 'getAudio'])->name('song');

