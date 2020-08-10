<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/test','PagesController@register');
Route::get('/',function (){
    return view('welcome');
});


Auth::routes();
/*Override register form route... For Referral purpose*/
Route::get('/register/{ref?}', 'Auth\RegisterController@showRegistrationForm')->name('register');


Route::get('/home', 'HomeController@index')->name('home');
