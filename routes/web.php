<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('{path}', 'HomeController@index')->where( 'path' , '([A-z\d\-\/_.]+)?' );

Route::namespace('Admin')->prefix('admin')->middleware(['auth','auth.admin'])->name('admin.')->group(function(){
    Route::resource('/users','UserController',['except'=>['show','create','store']]);
});// Route::resource('/users','Admin\UserController',['except'=>['show','create','store']]);
Route::get('/dailyacts/export','DailyactController@export')->name('export');
Route::get('/dailyacts/index','DailyactController@index');
Route::get('/dailyacts/search','DailyactController@search');
Route::resource('dailyacts','DailyactController')->middleware(['auth','auth.admin']);
Route::post('/dailyacts/import','DailyactController@import')->name('import');

Route::get('/animalinfos/search','AnimalinfoController@search');
Route::get('/animalinfos/export','AnimalinfoController@export')->name('animalexport');
Route::get('/animalinfos/index','AnimalinfoController@index');
Route::resource('animalinfos','AnimalinfoController')->middleware(['auth','auth.admin']);
Route::post('/animalinfos/import','AnimalinfoController@import')->name('animalimport');

Route::get('/breedings/search','BreedingController@search');
Route::get('/breedings/export','BreedingController@export')->name('breedexport');
Route::get('/breedings/index','BreedingController@index');
Route::resource('breedings','BreedingController')->middleware(['auth','auth.admin']);
Route::post('/breedings/import','BreedingController@import')->name('breedimport');

Route::get('/stocks/search','StockController@search');
Route::get('/stocks/export','StockController@export')->name('stockexport');
Route::get('/stocks/index','StockController@index');
Route::resource('stocks','StockController')->middleware(['auth','auth.admin']);











