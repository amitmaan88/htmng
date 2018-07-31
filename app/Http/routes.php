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

/* Route::get('/', function () {
  return view('welcome');
  }); */

Route::auth();


Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::post('/changeStatus', 'UserController@changeStatus');
Route::post('/changeStatus', 'RoomController@changeStatus');
Route::post('/changeStatus', 'FoodController@changeStatus');
Route::get('/users/upload', array('as' => 'user.upload', 'uses' => 'UserController@upload'));
Route::get('/room/roomtype', array('as' => 'room.roomtype', 'uses' => 'RoomController@roomtype'));
Route::post('/room/rtype', array('as' => 'room.rtype', 'uses' => 'RoomController@rtype'));
Route::get('/notice/template', array('as' => 'notice.template', 'uses' => 'NoticeController@template'));
Route::post('/notice/template', array('as' => 'notice.template', 'uses' => 'NoticeController@template'));
Route::get('/food/item', array('as' => 'food.item', 'uses' => 'FoodController@item'));
Route::post('/food/menu', array('as' => 'food.menu', 'uses' => 'FoodController@menu'));

Route::resource('/users', 'UserController');
Route::resource('/room', 'RoomController');
Route::resource('/notice', 'NoticeController');
Route::resource('/complaint', 'ComplaintController');
Route::resource('/hotel', 'HotelController');
Route::resource('/food', 'FoodController');
Route::resource('/report', 'ReportController');

Route::get('/logout', 'Auth\AuthController@logout');
