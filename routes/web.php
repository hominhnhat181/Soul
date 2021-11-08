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
// switch to ajax
// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


// // social login
Route::get('login/social/{provider}', [App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider'])->name('login.social');
Route::get('social/{provider}/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback'])->name('register.social.callback');


// Ajax Location
Route::prefix('ajax')->namespace('App\\Http\\Controllers')->group(function(){
    Route::post('get-districts', 'AjaxController@getDistrict')->name('ajax.get.district');
    Route::post('get-wards', 'AjaxController@getWard')->name('ajax.get.ward');
});
// Ajax Loadmore
Route::get('/', [App\Http\Controllers\AjaxController::class, 'getArticles'])->name('home');


// User
Route::get('profile/{id}', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');


// Language
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);


// song
Route::get('/{id}/playlist', [App\Http\Controllers\PlaylistController::class, 'goPlaylist'])->name('playlist');
// Route::get('/{song}/playlist', [App\Http\Controllers\PlaylistController::class, 'getAudio'])->name('song');


// library
Route::get('library/{user_id}',[\App\Http\Controllers\LibraryController::class, 'library'])->name('library');
Route::get('library2',[\App\Http\Controllers\LibraryController::class, 'library2'])->name('library2');


Route::post('/library', [App\Http\Controllers\LibraryController::class, 'addLibrary'])->name('addLibrary');
Route::delete('library/{album_id}', [\App\Http\Controllers\LibraryController::class, 'destroy'])->name('libraryDestroy');


Route::get('/test', [App\Http\Controllers\HomeController::class, 'test']);