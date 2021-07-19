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



Route::prefix('admin')->namespace('App\\Http\\Controllers\\Admin')->group(function () {
    Route::get('/', 'DashboardController@dashboard')->name('admin.dashboard');
    
    // feature
    Route::get('/feature', 'FeatureController@show')->name('admin.feature');

    // album
    Route::prefix('/album')->group(function () {
    Route::get('/', 'AlbumController@show')->name('admin.album');
    Route::get('/{id}/changeSt', 'AlbumController@changeStatus')->name('admin.changeSt');
    Route::get('/create', 'AlbumController@create')->name('admin.album.create');
    Route::post('/create', 'AlbumController@store')->name('admin.album.store');
    Route::get('/{id}/update', 'AlbumController@edit')->name('admin.album.edit');
    Route::post('/{id}/update', 'AlbumController@update')->name('admin.album.update');

    Route::get('/{id}/destroy', 'AlbumController@destroy')->name('admin.album.destroy');

    });

    // genre
    Route::get('/genre', 'GenreController@show')->name('admin.genre');

    // artist
    Route::get('/artist', 'ArtistController@show')->name('admin.artist');

    // track
    Route::get('/track', 'TrackController@show')->name('admin.track');

    // user
    Route::get('/user', 'UserController@show')->name('admin.user');



});