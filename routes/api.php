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

//получение шахматной позиции, запись новой шахматной позиции, изменение существующей шахматной позиции.

Route::get('/chess', 'Chess\ChessController@test'); // --------

Route::get('/chess/{square}', 'Chess\ChessController@getPiece'); // +++
Route::delete('/chess/{square}', 'Chess\ChessController@remove'); // 
Route::put('/chess/{from}/{to}', 'Chess\ChessController@moveTo');//
Route::post('/chess/{typepop}/{color}/{square}',  'Chess\ChessController@putTo'); // задать новую позицию
Route::get('/board/',  'Chess\ChessController@getBoard'); // посмотреть поле
