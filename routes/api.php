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
// Guest routes (without autorization)
Route::get('books', 'BookController@index');
Route::get('search-title/{title}', 'BookController@searchByTitle'); // Search by title endpoint
Route::get('search-year/{year}', 'BookController@searchByYear'); // Search by year endpoint
// Registration
Route::post('register', 'UsersController@store');
Route::post('login', 'Auth\LoginController@authenticate');
// Authorized actions
Route::middleware('jwt.auth')->post('book', 'BookController@store'); // Create new book
Route::middleware('jwt.auth')->delete('book/{id}', 'BookController@destroy'); // Delete a book
Route::middleware('jwt.auth')->put('book/{id}/edit', 'BookController@update'); // Edit a book