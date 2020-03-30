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



/*
|--------------------------------------------------------------------------
| Articles Routes
|--------------------------------------------------------------------------
*/
Route::resource('articles', 'ArticlesController');
Route::get('article/{id}/show', 'ArticlesController@show');
Route::get('article/{id}/edit', 'ArticlesController@edit');
Route::post('article/{id}/update', 'ArticlesController@update');
Route::get('article/{id}/delete', 'ArticlesController@destroy');
