<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// GET POST PUT DELETE UPDATE

// Route::get('/', function () {
// 	return view('welcome');
// });

// Route::get('page', 'IndexController@index');
Route::get( '/', 'IndexController@index' );

Route::get( 'article/{id}', 'IndexController@show' )->name( 'articleShow' ); // name('articleShow') - псевдоним

Route::get( 'page/add', 'IndexController@add' );
Route::post( 'page/add', 'IndexController@store' )->name( 'articleStore' );

Route::delete( 'page/delete/{article}', 'IndexController@delete' )->name( 'articleDelete' );
