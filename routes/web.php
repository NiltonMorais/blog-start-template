<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('/category/{category}', 'HomeController@category')->name('category');
Route::get('/post/{post}', 'HomeController@post')->name('post');

Route::group([
    'namespace' => 'Admin\\',
    'prefix'=>'admin',
    'as'=>'admin.',
    'middleware' => ['auth']
], function(){
    Route::get('', function(){
        return view('admin.index');
    })->name('index');

    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('', 'CategoryController@index')->name('index');
        Route::get('create', 'CategoryController@create')->name('create');
        Route::post('store', 'CategoryController@store')->name('store');
        Route::get('show/{category}', 'CategoryController@show')->name('show');
        Route::get('edit/{category}', 'CategoryController@edit')->name('edit');
        Route::put('update/{category}', 'CategoryController@update')->name('update');
        Route::get('destroy/{category}', 'CategoryController@destroy')->name('destroy');
    });

    Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
        Route::get('', 'PostController@index')->name('index');
        Route::get('create', 'PostController@create')->name('create');
        Route::post('store', 'PostController@store')->name('store');
        Route::get('show/{post}', 'PostController@show')->name('show');
        Route::get('edit/{post}', 'PostController@edit')->name('edit');
        Route::put('update/{post}', 'PostController@update')->name('update');
        Route::get('destroy/{post}', 'PostController@destroy')->name('destroy');
    });

});

Auth::routes();

