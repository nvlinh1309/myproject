<?php

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



Route::get('admin/{i}/{j}',function($i,$j){
		return $tong=$i+$j;;
});

Route::get('admin',function(){
		return 'Admin';
});

//group
Route::group(['prefix'=>'admin'],function(){
	Route::get('home',function(){
		return 'Home';
	}); 
});

//controller

Route::get('controller/{i}/{j}', 'MyController@getController');

//view

Route::get('/', function () {
    return view('test');
});

Route::get('view', 'MyController@getView');