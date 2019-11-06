<?php

Route::get('/hotel-management', 'HotelController@hotelManagementView')->name('hotel-management');
Route::get('/search-hotels', 'HotelController@searchHotels');
Route::get('/show-hotel/{id}', 'HotelController@showHotel');
Route::get('/delete-hotel/{id}', 'HotelController@deleteHotel');
Route::get('/show-hotel/{id}', 'HotelController@showHotel');
Route::post('/save-hotel', 'HotelController@storeHotel');

Route::get('/business-management', 'BusinessController@businessManagementView')->name('business-management');

Route::get('/user-management', 'UserController@userManagementView')->name('user-management');
Route::get('/search-users', 'UserController@searchUsers');
Route::get('/show-user/{id}', 'UserController@showUser');
Route::get('/delete-user/{id}', 'UserController@deleteUser');
Route::get('/show-user/{id}', 'UserController@showUser');
Route::post('/save-user', 'UserController@storeUser');
