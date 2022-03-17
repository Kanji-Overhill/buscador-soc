<?php

use Illuminate\Support\Facades\Route;

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

Route::post('/micrositios/all','App\Http\Controllers\micrositiosController@getAll')->name('getAllMicrositios');
Route::post('/micrositios/search','App\Http\Controllers\micrositiosController@search')->name('searchMicrositios');
Route::post('/asesores/all','App\Http\Controllers\micrositiosAsesoresController@getAll')->name('getAllAsesores');