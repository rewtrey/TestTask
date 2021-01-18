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





 Route::middleware(['is_admin'])->group(function () {
 Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
 Route::get('handleAdmin', 'App\Http\Controllers\HomeController@adminHome')->name('handleAdmin')->middleware('is_admin');
 Route::resource('category', \App\Http\Controllers\Admin\CategoryController::class)->middleware('is_admin');
    //Route::group(['prefix' => 'admin', 'namespase' => 'Admin'], function (){
        //Route::resource('/categori', \App\Http\Controllers\Admin\CategoryController::class, ['as' => 'admin.categori']);

 Route::group(['prefix' => 'user_managment', 'namespase' => 'UserManagment'], function (){
 Route::resource('/user', \App\Http\Controllers\Admin\UserManagment\UserController::class, ['as' => 'admin.user.managment']);
    });


});




Route::get('login', 'App\Http\Controllers\AuthController@showLoginForm');
Route::get('register', 'App\Http\Controllers\AuthController@showRegisterForm');
Route::post('login', 'App\Http\Controllers\AuthController@login');
Route::post('register', 'App\Http\Controllers\AuthController@register');
Route::get('logout', 'App\Http\Controllers\AuthController@logout');

Route::resource('blogs', \App\Http\Controllers\BlogController::class);







