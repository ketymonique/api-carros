<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/status', 'Api\ClientesController@status');

Route::namespace('App\Http\Controllers')->group( function() {

    Route::post('/cliente', 'ClientesController@cliente');

    Route::get('/cliente/{id}', 'ClientesController@select');
    Route::get('/consulta/final-placa/{numero}', 'ClientesController@finalPlaca');

    Route::put('/cliente/{id}', 'ClientesController@update');

    Route::delete('/cliente/{id}', 'ClientesController@delete');

});

