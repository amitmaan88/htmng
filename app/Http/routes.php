<?php

/* Route::get('/', function () {
  return view('welcome');
  }); */

Route::auth();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::post('/room/cstatus', array('as' => 'room.changeStatus', 'uses' => 'RoomController@cstatus'));
Route::post('/food/cstatus', array('as' => 'food.changeStatus', 'uses' => 'FoodController@cstatus'));
Route::post('/complaint/cstatus', array('as' => 'complaint.changeStatus', 'uses' => 'ComplaintController@cstatus'));

Route::post('/room/rtype', array('as' => 'room.rtype', 'uses' => 'RoomController@rtype'));
Route::get('/notice/template', array('as' => 'notice.template', 'uses' => 'NoticeController@template'));
Route::post('/notice/template', array('as' => 'notice.template', 'uses' => 'NoticeController@template'));
Route::post('/notice/serve', array('as' => 'notice.serve', 'uses' => 'NoticeController@serve'));
Route::get('/food/item', array('as' => 'food.item', 'uses' => 'FoodController@item'));
Route::post('/food/menu', array('as' => 'food.menu', 'uses' => 'FoodController@menu'));
Route::get('/complaint/index/{c?}', array('as' => 'complaint.index', 'uses' => 'ComplaintController@index'));

Route::group(['middleware' => 'auth'], function() {
    Route::resource('/', 'HomeController');
    Route::resource('/notice', 'NoticeController');
    Route::resource('/complaint', 'ComplaintController');
    Route::resource('/hotel', 'HotelController');
    Route::resource('/food', 'FoodController');
    Route::resource('/report', 'ReportController');    
});
Route::group(['middleware' => ['auth', 'checkAdmin']], function() {
    Route::post('/users/cstatus', array('as' => 'users.changeStatus', 'uses' => 'UserController@cstatus'));
    Route::get('/users/upload', array('as' => 'user.upload', 'uses' => 'UserController@upload'));
});

Route::group(['middleware' => ['auth', 'checkOwner']], function() {
    
});

Route::group(['middleware' => ['auth', 'checkAdminOwner']], function() {
    Route::resource('/users', 'UserController');
    Route::resource('/password', 'PasswordController');
    Route::get('/room/roomtype/{room?}', array('as' => 'room.roomtype', 'uses' => 'RoomController@roomtype'));    
    Route::resource('/room', 'RoomController');
});



Route::get('/logout', 'Auth\AuthController@logout');
