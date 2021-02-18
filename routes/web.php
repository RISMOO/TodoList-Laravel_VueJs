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
//ON RECUPERE
Route::get('/tasksList/{q?}','TaskController@index');//requete q facultatif
//ON ENREGISTRE
Route::post('/tasksList','TaskController@store');


//EDIT
Route::get('/tasks/edit/{id}','TaskController@edit');

//UPDATE

Route::patch('/tasks/edit/{id}','TaskController@update');
//DELETE
Route::delete('/tasks/{id}','TaskController@destroy');
