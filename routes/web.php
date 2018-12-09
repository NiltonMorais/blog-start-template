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
    return view('welcome');
});

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

Route::get('/home', 'HomeController@index')->name('home');
