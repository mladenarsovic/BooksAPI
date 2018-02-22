<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('books', 'BookController@index');
Route::get('search/{title}', 'BookController@searchByTitle'); // Search by title endpoint
Route::get('search/{year}', 'BookController@searchByYear'); // Search by year endpoint

Route::post('register', 'UsersController@store');
Route::post('login', 'Auth\LoginController@authenticate');
