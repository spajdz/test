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
// Por serguridad para que los servicios solo lleguen a estas funciones
// sino mal recuerdo 

Route::resource('user', 'UserController', ['only' => [
    'index', 'getSpecific', 'store'
]]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/home', 'UserController@index');
Route::get('/api/home/{id}', 'UserController@getSpecific');
Route::post('/api/home', 'UserController@store');
Route::post('/api/home/{id}', 'UserController@update');