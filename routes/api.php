<?php

use Illuminate\Http\Request;

Route::get('/', 'TodosController@index');
Route::post('/', 'TodosController@store');
Route::delete('/', 'TodosController@destroyAll');
Route::get('/{id}', 'TodosController@show');
Route::patch('/{id}', 'TodosController@update');
Route::delete('/{id}', 'TodosController@destroy');
