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

Route::post('/register', 'API\AuthController@register');
Route::post('/login', 'API\AuthController@login');

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', 'API\AuthController@logout');
    Route::get('/get-user', 'API\AuthController@getUser');
    Route::get('/boards', 'BoardController@index');
    Route::post('/boards/create', 'BoardController@store');
    Route::post('/boards/{board}/edit', 'BoardController@update');
    Route::delete('/boards/{board}/delete', 'BoardController@destroy');

    Route::post('/tasks/create', 'TaskController@store');
    Route::post('/tasks/{task}/edit', 'TaskController@update');
    Route::delete('/tasks/{task}/delete', 'TaskController@destroy');

});