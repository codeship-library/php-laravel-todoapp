<?php

use Illuminate\Http\Request;

Route::group(['prefix' => 'todos'], function() {

    Route::get('/', "TodosController@index");
    Route::post('/', "TodosController@create");
    Route::delete('/', 'TodosController@deleteAll');

    Route::group(['prefix' => '{id}'], function() {
        Route::get('/', "TodosController@get");
        Route::patch('/', "TodosController@update");
        Route::delete('/', "TodosController@delete");
    });

});
