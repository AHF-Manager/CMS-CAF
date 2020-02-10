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
Route::apiResources(['dailyact'=>'API\DailyactController']);
Route::apiResources(['user' => 'API\UserController']);
Route::apiResources(['animalinfo'=>'API\AnimalinfoController']);
Route::apiResources(['breeding'=>'API\BreedingController']);
Route::apiResources(['stock'=>'API\StockController']);

Route::get('findSTdata','API\StockController@search');

Route::post('breedimport','API\BreedingController@import');
Route::get('findBGdata','API\BreedingController@search');

Route::post('import','API\DailyactController@import');
Route::get('findDAdata','API\DailyactController@search');

Route::post('animport','API\AnimalinfoController@import');
Route::get('findANdata','API\AnimalinfoController@search');

Route::get('findUser', 'API\UserController@search');

// Route::get('export', 'API\DailyactController@export');

