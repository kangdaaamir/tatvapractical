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
   return Redirect::to('/login');
});



Route::get('login', 'AuthController@index')->name('login');
Route::post('post-login', 'AuthController@postLogin'); 
Route::get('register', 'AuthController@register')->name('signup');
Route::post('post-register', 'AuthController@postRegister'); 
Route::get('dashboard', 'AuthController@dashboard'); 
Route::get('logout', 'AuthController@logout');


 Route::get('/blogs',                 'BlogController@index')->name('blog.index');
    
    Route::get('/blogs/create',          'BlogController@create')->name('blog.create');
    Route::post('/blogs/store',          'BlogController@store')->name('blog.store');
    
    Route::get('/blogs/edit/{id}',       'BlogController@edit')->name('blog.edit');
    Route::put('/blogs/update/{id}',     'BlogController@update')->name('blog.update');
    
    Route::delete('/blogs/delete/{id}',  'BlogController@delete')->name('blog.delete');