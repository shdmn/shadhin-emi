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

Route::get('/', 'FrontController@index')->name('home');
Route::post('/user/registration', 'UserController@store')->name('user.registration');
Route::post('/user/login', 'UserController@login')->name('user.login');
Route::prefix('user')->middleware(['auth'])->group(function(){
	Route::get('/index', 'UserController@index')->name('user.index');
	Route::post('/application-store', 'UserController@application_store')->name('user.apply');
});

Route::prefix('admin')->middleware(['admin_auth'])->group(function(){
	Route::get('/index', 'AdminController@index')->name('admin.index');
	Route::get('/moderate/application/{user}/{status}', 'AdminController@modarate_application')->name('moderate.application');	
});

