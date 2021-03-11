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

Route::get('/logout','Auth\LoginController@logout')->name('logoutt');
Route::get('/','App\Http\Controllers\Admin\UserController@dashboard')->name('dashboard')->middleware('auth');

Route::get('/waiting_page','App\Http\Controllers\Admin\UserController@waiting_page')->name('waiting.page');


Route::group(['prefix'=>'Books_management','middleware' =>
    ['auth','waiting'],'namespace'=>'App\Http\Controllers\Admin'],function (){
    Route::resource('/admin/user','UserController');
    Route::resource('/admin/course','CourseController');
    Route::resource('/admin/book','BookController');


});

Route::group(['prefix'=>'Books_management','middleware' => 'auth','namespace'=>'App\Http\Controllers\Student'],function (){

    Route::resource('/student_book','StudentBookController');



});




Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
