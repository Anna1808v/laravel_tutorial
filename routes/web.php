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

Route::get('/', 'HomeController@index');

Route::group(['namespace'=>'Pet'], function() {

    Route::get('/pets', 'IndexController')->name('pet.index');
    Route::get('/pets/create', 'CreateController')->name('pet.create');

    Route::post('/pets', 'StoreController')->name('pet.store');
    Route::get('/pets/{pet}', 'ShowController')->name('pet.show');
    Route::get('/pets/{pet}/edit', 'EditController')->name('pet.edit');
    Route::patch('/pets/{pet}', 'UpdateController')->name('pet.update');
    Route::delete('/pets/{pet}', 'DestroyController')->name('pet.destroy');
});

// Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
//     Route::group(['namespace' => 'Pet'], function() {
//         Route::get('/pet', 'IndexController')->name('admin.post.index');
//     });
// });

Route::prefix('admin')->namespace('Admin')->group(function (){
    Route::namespace('Pet')->group( function (){
        Route::get('/pet', 'IndexController')->name('admin.pet.index');
    });
});

Route::get('/pets/update', 'PetController@update');
Route::get('/pets/delete', 'PetController@delete');
Route::get('/pets/first_or_create', 'PetController@firstOrCreate');
Route::get('/pets/update_or_create', 'PetController@updateOrCreate');

Route::get('/about', 'AboutController@index')->name('about.index');
Route::get('/main', 'MainController@index')->name('main.index');
Route::get('/second_page', 'Second_pageController@index')->name('second_page.index');











Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
