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



Route::group(['prefix' => 'task_5'], function () {
    Route::get('/', ['as' => 'home', 'uses' => 'IndexController@show']);

    Route::get('page/create', function (){
        return redirect()->route('article', array('id' => 23));
    });

    Route::get('page/{id}', function (){
        echo 'task_5/page/edit';
    });

    Route::get('/db', ['uses' => 'Core@getCountries', 'as' => 'db']);

    Route::get('/edition', ['uses' => 'EditionController@getEditions', 'as' => 'editionAll']);

    Route::get('/edition/sort/{sort?}', ['uses' => 'EditionController@getEditions', 'as' => 'editionAll']);

    Route::get('/about/{id}', ['uses' => 'FirstController@show', 'as' => 'about', 'middleware' => 'mymiddle']);


});

