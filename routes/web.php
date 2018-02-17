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

// Middleware include
use App\Http\Middleware\HelloMiddleware;

Route::get('hello', 'HelloController@index')
    ->middleware('halo');
Route::post('hello', 'HelloController@post');

Route::get('validation', 'HelloController@val');
Route::post('validation', 'HelloController@post');

Route::get('cookie', 'HelloController@cookieEntry');
Route::post('cookie', 'HelloController@cookiePost');

Route::get('dbcon', 'HelloController@dbCon');
Route::get('dbcon/add', 'HelloController@dbAdd');
Route::post('dbcon/add', 'HelloController@dbInsert');
Route::get('dbcon/edit', 'HelloController@dbEdit');
Route::post('dbcon/edit', 'HelloController@dbUpdate');
Route::get('dbcon/del', 'HelloController@dbRemove');
Route::post('dbcon/del', 'HelloController@dbDelete');
Route::get('dbcon/show', 'HelloController@dbShow');
Route::get('dbcon/shows', 'HelloController@dbShows');
