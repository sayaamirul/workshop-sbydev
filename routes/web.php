<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->prefix('article')->group(function() {
    Route::get('create', 'ArticleController@create')->name('article.create');
    Route::post('create', 'ArticleController@store')->name('article.store');
    Route::get('{id}', 'ArticleController@show')->name('article.show');
    Route::get('{id}/edit', 'ArticleController@edit')->name('article.edit');
    Route::put('{id}', 'ArticleController@update')->name('article.update');
    Route::delete('{id}', 'ArticleController@destroy')->name('article.destroy');
});

Route::get('/user/{user}', 'ProfileController@index')->name('profile');

