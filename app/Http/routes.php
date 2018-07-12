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
Route::post('/changeSatus', 'UserController@changeSatus');
Route::get('/users/upload', array('as' => 'user.upload', 'uses' => 'UserController@upload'));
Route::get('/room/roomtype', array('as' => 'room.roomtype', 'uses' => 'RoomController@roomtype'));
Route::get('/notice/template', array('as' => 'notice.template', 'uses' => 'NoticeController@template'));

Route::resource('/users', 'UserController');
Route::resource('/room', 'RoomController');
Route::resource('/notice', 'NoticeController');
Route::resource('/complaint', 'ComplaintController');