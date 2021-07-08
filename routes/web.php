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

    Route::get('/user/delete/{id}','UserController@destroy')->name('user.destroy.get');

    Route::get('/indexPendingUsers','UserController@indexPendingUsers')->name('indexPendingUsers');
    Route::get('/updatePendingUsers/{id}','UserController@updatePendingUsers')->name('updatePendingUsers');


    Route::resource('/Category','CategoryController');
    Route::resource('/book','BookController');

   //requests
    Route::get('/request/index','RequestController@index')->name('admin.request.index');
    Route::get('/request/update-status/{id?}/{status?}','RequestController@update_status')->name('admin.request.update_status');
    Route::get('/request/index_ajax','RequestController@index_ajax')->name('admin.index_ajax.index');


    //BookingBook
    Route::get('/createReservedBook','BookController@createReservedBook')->name('admin.createReservedBook.create');
    Route::post('/storeReservedBook','BookController@storeReservedBook')->name('admin.storeReservedBook.store');
    Route::get('/indexReservedBook','BookController@indexReservedBook')->name('admin.indexReservedBook.index');
    Route::get('/editReservedBook/{id}','BookController@editReservedBook')->name('admin.editReservedBook.edit');
    Route::PUT('/updateReservedBook/{id}','BookController@updateReservedBook')->name('admin.updateReservedBook.update');
    Route::get('/statusReservedBook/{status?}/{id?}','BookController@statusReservedBook')->name('admin.statusReservedBook.update');

});

Route::group(['prefix'=>'user','middleware' => ['auth','waiting']],function (){
    Route::resource('/student_book', 'App\Http\Controllers\user\BookController');
    Route::get('/library', 'App\Http\Controllers\user\BookController@library')->name('library');

    Route::get('create/{id}','App\Http\Controllers\user\RequestController@create')->name('request.create');
    Route::post('/request/store','App\Http\Controllers\user\RequestController@store')->name('request.store');
    Route::get('/request/index','App\Http\Controllers\user\RequestController@index')->name('request.index');
    Route::get('/profile_user','App\Http\Controllers\Admin\UserController@profile_user')->name('profile_user.index');
    // indexReservedBookUser
   //
    Route::get('/indexReservedBookUser','App\Http\Controllers\user\BookController@indexReservedBookUser')->name('user.indexReservedBookUser.index');
    Route::get('/indexBooksRequiredToDeliver','App\Http\Controllers\user\BookController@indexBooksRequiredToDeliver')->name('user.indexBooksRequiredToDeliver.index');

});





