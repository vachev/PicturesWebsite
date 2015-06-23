<?php

Route::get('/', function () {
    return redirect('/home');
});

Route::get('home', 'HomeController@index');

Route::get('pictures', 'PicturesController@index');
Route::delete('pictures/delete/{id}', 'PicturesController@deletePicture');

Route::get('users', 'UsersController@index');

Route::get('contacts', 'ContactsController@index');
Route::post('contacts/send', 'ContactsController@sendEmailAndSaveIt');

Route::get('upload', 'PicturesController@upload');

Route::get('edit', 'EditController@index');
Route::post('edit', 'EditController@makeEdit');

Route::post('upload', 'PicturesController@store');

Route::get('show/{id}', 'PicturesController@show');
Route::post('show/{id}', 'PicturesController@storeComment');

Route::delete('comments/delete/{idCom}/{idPic}', 'PicturesController@deleteComment');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('admin', 'AdminController@index');
Route::get('admin/pictures', 'AdminController@pictures');
Route::get('admin/users', 'AdminController@users');
Route::delete('admin/users/delete/{id}', 'AdminController@deleteUser');
Route::post('admin/users/show/{id}', 'AdminController@showImages');