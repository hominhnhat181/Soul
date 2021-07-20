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
    Route::prefix('/feature')->group(function () {
        Route::get('/', 'FeatureController@show')->name('admin.feature');
        Route::get('/{id}/featureSt', 'FeatureController@changeStatus')->name('admin.feature.status');
        Route::get('/create', 'FeatureController@create')->name('admin.feature.create');
        Route::post('/create', 'FeatureController@store')->name('admin.feature.store');
        Route::get('/{id}/update', 'FeatureController@edit')->name('admin.feature.edit');
        Route::post('/{id}/update', 'FeatureController@update')->name('admin.feature.update');
        Route::get('/{id}/destroy', 'FeatureController@destroy')->name('admin.feature.destroy');
    });
    // album
    Route::prefix('/album')->group(function () {
        Route::get('/', 'AlbumController@show')->name('admin.album');
        Route::get('/{id}/albumSt', 'AlbumController@changeStatus')->name('admin.album.status');
        Route::get('/create', 'AlbumController@create')->name('admin.album.create');
        Route::post('/create', 'AlbumController@store')->name('admin.album.store');
        Route::get('/{id}/update', 'AlbumController@edit')->name('admin.album.edit');
        Route::post('/{id}/update', 'AlbumController@update')->name('admin.album.update');
        Route::get('/{id}/destroy', 'AlbumController@destroy')->name('admin.album.destroy');
    });

    // genre
    Route::prefix('/genre')->group(function () {
        Route::get('/', 'GenreController@show')->name('admin.genre');
        Route::get('/{id}/genreSt', 'GenreController@changeStatus')->name('admin.genre.status');
        Route::get('/create', 'GenreController@create')->name('admin.genre.create');
        Route::post('/create', 'GenreController@store')->name('admin.genre.store');
        Route::get('/{id}/update', 'GenreController@edit')->name('admin.genre.edit');
        Route::post('/{id}/update', 'GenreController@update')->name('admin.genre.update');
        Route::get('/{id}/destroy', 'GenreController@destroy')->name('admin.genre.destroy');
    });
    // artist
    Route::prefix('/artist')->group(function () {
        Route::get('/', 'ArtistController@show')->name('admin.artist');
        Route::get('/{id}/artistSt', 'ArtistController@changeStatus')->name('admin.artist.status');
        Route::get('/create', 'ArtistController@create')->name('admin.artist.create');
        Route::post('/create', 'ArtistController@store')->name('admin.artist.store');
        Route::get('/{id}/update', 'ArtistController@edit')->name('admin.artist.edit');
        Route::post('/{id}/update', 'ArtistController@update')->name('admin.artist.update');
        Route::get('/{id}/destroy', 'ArtistController@destroy')->name('admin.artist.destroy');
    });
    // track
    Route::prefix('/track')->group(function () {
        Route::get('/', 'TrackController@show')->name('admin.track');
        Route::get('/{id}/artistSt', 'TrackController@changeStatus')->name('admin.track.status');
        Route::get('/create', 'TrackController@create')->name('admin.track.create');
        Route::post('/create', 'TrackController@store')->name('admin.track.store');
        Route::get('/{id}/update', 'TrackController@edit')->name('admin.track.edit');
        Route::post('/{id}/update', 'TrackController@update')->name('admin.track.update');
        Route::get('/{id}/destroy', 'TrackController@destroy')->name('admin.track.destroy');
    });
    // user
    Route::prefix('/user')->group(function () {
        Route::get('/', 'UserController@show')->name('admin.user');
        Route::get('/{id}/userSt', 'UserController@changeStatus')->name('admin.user.status');
        Route::get('/create', 'UserController@create')->name('admin.user.create');
        Route::post('/create', 'UserController@store')->name('admin.user.store');
        Route::get('/{id}/update', 'UserController@edit')->name('admin.user.edit');
        Route::post('/{id}/update', 'UserController@update')->name('admin.user.update');
        Route::get('/{id}/destroy', 'UserController@destroy')->name('admin.user.destroy');
    });


});