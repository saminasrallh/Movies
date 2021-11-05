<?php

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
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::post('/SaveMovie', 'HomeController@save')->name('SaveMovie');
    Route::delete('/home/{id}', 'HomeController@deletemovie')->name('delete');
    Route::get('/create_movie', 'HomeController@create')->name('create');
    Route::get('/update/{id}', 'HomeController@update')->name('update');
    Route::put('/update_movie/{id}', 'HomeController@mov')->name('update_movie');
    Route::get('showmovie/{id}', 'HomeController@show')->name('show');
});


