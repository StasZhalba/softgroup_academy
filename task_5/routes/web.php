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


Route::post('/task_5/comments', function (){
    print_r($_POST);
});

Route::get('/task_5/comments', function (){
    return view('edition_admin');
});

Route::group(['prefix' => '/task_5'], function () {
    Route::get('/', ['as' => 'home', 'uses' => 'IndexController@show']);

    Route::get('page/create', function (){
        return redirect()->route('article', array('id' => 23));
    });

    Route::get('page/{id}', function (){
        echo 'task_5/page/edit';
    });

    Route::get('/db', ['uses' => 'Core@getCountries', 'as' => 'db']);

    Route::get('/book', ['uses' => 'BookController@getBooks', 'as' => 'booksAll']);
    Route::get('/book/{where}/{id}/{sort?}', ['uses' => 'BookController@getBooksWhere', 'as' => 'booksWhere']);
    Route::get('/book/delete/{id}', ['uses' => 'BookController@deleteBook', 'as' => 'deleteBook']);

    Route::get('/author', ['uses' => 'AuthorController@getAuthors', 'as' => 'authorsAll']);
    Route::get('/author/delete/{id}', ['uses' => 'AuthorController@deleteAuthor', 'as' => 'deleteAuthor']);
    Route::get('/author/sort/{sort?}', ['uses' => 'AuthorController@getAuthors', 'as' => 'authorAllSort']);

    Route::get('/edition', ['uses' => 'EditionController@getEditions', 'as' => 'editionAll']);
    Route::get('/edition/delete/{id}', ['uses' => 'EditionController@deleteAuthor', 'as' => 'deleteEdition']);
    Route::get('/edition/sort/{sort?}', ['uses' => 'EditionController@getEditions', 'as' => 'editionAllSort']);
    //Route::get('/edition/add', 'EditionController@addEdition');
    Route::match(['get', 'post'], '/edition/add', ['uses' => 'EditionController@addEdition', 'as' => 'editionAdd']);
    Route::get('/about/{id}', ['uses' => 'FirstController@show', 'as' => 'about', 'middleware' => 'mymiddle']);


});

