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
        Route::get('', ['as' => 'index', 'uses' => "CategoryController@index"]);
        Route::get('create', ['as' => 'create', 'uses' => "CategoryController@create"]);
        Route::post('store', ['as' => 'store', 'uses' => "CategoryController@store"]);
        Route::get('show/{category}', ['as' => 'show', 'uses' => "CategoryController@show"]);
        Route::get('edit/{category}', ['as' => 'edit', 'uses' => "CategoryController@edit"]);
        Route::put('update/{category}', ['as' => 'update', 'uses' => "CategoryController@update"]);
        Route::get('destroy/{category}', ['as' => 'destroy', 'uses' => "CategoryController@destroy"]);
    });

    Route::resource('posts', 'PostController');
    //Route::resource('categories', 'CategoryController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
