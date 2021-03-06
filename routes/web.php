<?php

use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

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

Route::resource('/','FrontEnd\PostController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['namespace'=>'BackEnd','middleware'=>'auth'],function (){
    Route::resource('/category','CategoryController');
    Route::resource('/post','PostController');
    Route::resource('/role','RoleController');
    Route::resource('/user','UserController');
//    Route::get('/user','UserController@index')->name('user.index');
//    Route::get('/user/create','UserController@create')->name('user.create');
//    Route::post('/user','UserController@store')->name('user.store');
});
Route::group(['prefix'=>'laravel-filemanager','middleware'=>['web','auth']],function (){
    Lfm::routes();
});
