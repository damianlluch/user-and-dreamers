<?php

Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/category/{category}/tasks', 'DreamerController@tasks');
    Route::resource('/category', 'DreamerController');
    Route::resource('/task', 'TaskController');
});
