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

Route::get('/hi', function () {
    return 'welcome';
});

Route::get('/pets', 'PetController@index');
Route::get('/pets/create', 'PetController@create');
Route::get('/pets/update', 'PetController@update');
Route::get('/pets/delete', 'PetController@delete');
Route::get('/pets/first_or_create', 'PetController@firstOrCreate');
Route::get('/pets/update_or_create', 'PetController@updateOrCreate');











