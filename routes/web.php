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
Auth::routes();

Route::get('/logout','App\Http\Controllers\Auth\LoginController@logout')->name('logoutt');
Route::get('/','App\Http\Controllers\Admin\UserController@dashboard')->name('dashboard')->middleware(['auth','waiting']);
Route::get('/waiting_page','App\Http\Controllers\Admin\UserController@waiting_page')->name('waiting.page');


Route::group(['prefix'=>'admin','middleware' => ['auth','waiting'],'namespace'=>'App\Http\Controllers\Admin'],function (){
    Route::resource('/user','UserController');
    Route::resource('/Category','CategoryController');
    Route::resource('/book','BookController');

   //requests
    Route::get('/request/index','RequestController@index')->name('admin.request.index');
    Route::get('/request/update-status/{id?}/{status?}','RequestController@update_status')->name('admin.request.update_status');
    Route::get('/request/index_ajax','RequestController@index_ajax')->name('admin.index_ajax.index');


    //booking book
    Route::get('/reserved-books','BookController@addReservedBookPage');

    Route::get('/Add-reserved-book','BookController@addReservedBook');

});

Route::group(['prefix'=>'user','middleware' => ['auth','waiting']],function (){
    Route::resource('/student_book','App\Http\Controllers\Student\StudentBookController');
    Route::get('create/{id}','App\Http\Controllers\Student\RequestController@create')->name('request.create');
    Route::post('/request/store','App\Http\Controllers\Student\RequestController@store')->name('request.store');
    Route::get('/request/index','App\Http\Controllers\Student\RequestController@index')->name('request.index');
    Route::get('/profile_user','App\Http\Controllers\Admin\UserController@profile_user')->name('profile_user.index');

});





