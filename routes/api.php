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

Route::prefix("v1")->namespace("api\\v1")->group(function(){
    Route::prefix("movies")->group(function(){
        Route::get("/", "MovieController@index");
        Route::post("/", "MovieController@store");
        Route::put("/{id}", "MovieController@update");
        Route::delete("/{id}", "MovieController@destroy");
        Route::post("/cover/{id}", "MovieController@cover");
        Route::get("/search/{search}", "MovieController@search");
    });

});
