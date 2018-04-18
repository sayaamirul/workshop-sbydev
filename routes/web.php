<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->prefix('article')->group(function() {
    Route::get('create', 'ArticleController@create')->name('article.create');
    Route::post('create', 'ArticleController@store')->name('article.store');
    Route::get('{article}', 'ArticleController@show')->name('article.show');
    Route::get('{article}/edit', 'ArticleController@edit')->name('article.edit');
    Route::put('{article}', 'ArticleController@update')->name('article.update');
    Route::delete('{article}', 'ArticleController@destroy')->name('article.destroy');
});

Route::get('/user/{user}', 'ProfileController@index')->name('profile');