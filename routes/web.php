<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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



Route::get('/', 'PostController@index')->name('index');

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('post', 'PostController',);
Route::post('comment', 'CommentController@store',);
Auth::routes();
