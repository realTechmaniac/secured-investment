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

//Index page route handler

Route::get('/','PagesController@index');


//Login page route handler

Route::get('/login', 'PagesController@login')->name('login');


//Registration  page route handler

Route::get('/register', 'PagesController@register')->name('register');