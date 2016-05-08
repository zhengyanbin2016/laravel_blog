<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('user/{id}', 'UserController@showProfile');
Route::any('/admin/test','Admin\LoginController@test');
Route::get('/test','IndexController@index');
Route::any('/admin/login','Admin\LoginController@login');
Route::get('/admin/code','Admin\LoginController@code');
//Route::get('/admin/getcode','Admin\LoginController@getcode');
Route::any('/admin/crypt','Admin\LoginController@crypt');
Route::any('/admin/index','Admin\IndexController@index');
Route::any('/admin/info','Admin\IndexController@info');

Route::group(['middleware' => ['admin.login']], function () {
    Route::any('/admin/index','Admin\IndexController@index');
    Route::any('/admin/info','Admin\IndexController@info');
    Route::any('/admin/quit','Admin\IndexController@quit');
});