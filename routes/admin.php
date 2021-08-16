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

Route::prefix('admin')->name('admin.')->namespace('App\\Http\\Controllers\\Admin')->group(function () {
    Route::get('/', 'DashboardController@dashboard')->name('dashboard');
    Route::get('/{id}/profile', 'UserController@admin')->name('profile');
    Route::post('/{id}/update', 'UserController@adminUpdate')->name('profile.update');
    // user 
    Route::prefix('user')->name('user.')->group(function () {
        Route::resource('/', 'UserController', ['parameters' => ['' => 'userId']]);
        Route::get('/{userId}/userSt', 'UserController@changeStatus')->name('status');
    });
    // artist
    Route::prefix('artist')->name('artist.')->group(function () {
        Route::resource('/', 'ArtistController', ['parameters' => ['' => 'id']]);
        Route::get('/{id}/artistSt', 'ArtistController@changeStatus')->name('status');
    });
    // feature
    Route::prefix('feature')->name('feature.')->group(function () {
        Route::resource('/', 'FeatureController', ['parameters' => ['' => 'id']]);
        Route::get('/{id}/featureSt', 'FeatureController@changeStatus')->name('status');
    });
    // album
    Route::prefix('album')->name('album.')->group(function () {
        Route::resource('/', 'AlbumController', ['parameters' => ['' => 'id']]);
        Route::post('/search', 'AlbumController@fillSearch')->name('fillSearch');
        Route::post('/{id}/albumSt', 'AlbumController@changeStatus')->name('status');
    });
    // genre
    Route::prefix('genre')->name('genre.')->group(function () {
        Route::resource('/', 'GenreController', ['parameters' => ['' => 'id']]);
        Route::get('/{id}/genreSt', 'GenreController@changeStatus')->name('status');
    });
    // track
    Route::prefix('track')->name('track.')->group(function () {
        Route::resource('/', 'TrackController', ['parameters' => ['' => 'id']]);
        Route::get('/{id}/trackSt', 'TrackController@changeStatus')->name('status');
    });
});


