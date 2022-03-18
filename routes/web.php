<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\micrositiosController;

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

Route::get('/ubica_asesor',[micrositiosController::class, 'ubica_asesor']);
Route::get('/ubica_oficina',[micrositiosController::class, 'ubica_oficina']);

Route::post('/micrositios/all','App\Http\Controllers\micrositiosController@getAll')->name('getAllMicrositios');
Route::post('/micrositios/search','App\Http\Controllers\micrositiosController@search')->name('searchMicrositios');
Route::post('/asesores/all','App\Http\Controllers\micrositiosAsesoresController@getAll')->name('getAllAsesores');
Route::post('/asesores/search','App\Http\Controllers\micrositiosAsesoresController@searchAsesores')->name('searchAsesores');