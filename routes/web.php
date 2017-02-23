<?php

Route::get('users', 'UserController@index');
Route::get('user', 'UserController@find');

Route::group(['middleware' => 'guest:web'], function () {
    Route::get('register', 'Auth\RegisterController@showRegistrationForm');
    Route::post('register', 'Auth\RegisterController@register');

    Route::get('login', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login');
});

Route:: group(['middleware' => 'auth:web'], function () {
    Route::post('logout', 'Auth\LoginController@logout');
    Route::get('home', 'HomeController@index');
    Route::get('/', 'HomeController@index');
});