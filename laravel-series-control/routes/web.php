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

use App\Http\Controllers\SeriesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/series', 'SeriesController@index')->name('list_series');
Route::get('/series/criar', 'SeriesController@create')->name('form_create_serie')->middleware('auth');
Route::post('/series/criar', 'SeriesController@store');
// Route::post('/series/remover/{id}','SeriesController@destroy');
Route::delete('/series/{id}','SeriesController@destroy');
Route::post('/series/{id}/editaNome', 'SeriesController@editaNome');

Route::get('/series/{serieId}/temporadas','SeasonsController@index');

Route::get('/temporadas/{season}/episodios','EpisodesController@index');
Route::post('/temporadas/{season}/episodios/assistir','EpisodesController@assistir');


//Resource Controllers
//https://laravel.com/docs/master/controllers 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
