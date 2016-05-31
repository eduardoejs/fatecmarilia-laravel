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

/*Route::get('/', function () {
    return view('welcome');
});

Route::auth();
Route::get('/home', 'HomeController@index');
*/

Route::auth();

Route::group(['middleware' => ['web']], function(){   
    
    Route::get('/', function(){
            return view('public.index');
    });    
    
    Route::get('/restrict/main', ['as' => 'restrict.home', 'uses' => 'HomeController@index']);
    
    Route::get('login/restrict', ['as' => 'loginRestrictArea', 'uses' => 'HomeController@index']);    
    Route::get('reset/restrict', ['as' => 'trocarSenha', 'uses' => 'HomeController@trocarSenha']);
});

Route::group(['prefix' => 'restrict', 'as' => 'restrict.', 'middleware' => 'web'], function(){
    
    Route::get('users', ['as' => 'users.index', 'uses' => 'Admin\UsersController@index']);
    Route::get('users/new', ['as' => 'users.create', 'uses' => 'Admin\UsersController@create']);
    Route::post('users/store', ['as' => 'users.store', 'uses' => 'Admin\UsersController@store']);
    Route::get('users/edit/{id}', ['as' => 'users.edit', 'uses' => 'Admin\UsersController@edit']);
    Route::put('users/update/{id}', ['as' => 'users.update', 'uses' => 'Admin\UsersController@update']);
    Route::get('users/destroy/{id}', ['as' => 'users.destroy', 'uses' => 'Admin\UsersController@destroy']);
    Route::get('users/roles/{id}', ['as' => 'users.roles', 'uses' => 'Admin\UsersController@roles']);
    Route::get('users/roles/{id}/store', ['as' => 'users.roles.store', 'uses' => 'Admin\UsersController@storeRole']);
    Route::get('users/roles/{id}/revoke/{role_id}', ['as' => 'users.roles.revoke', 'uses' => 'Admin\UsersController@revokeRole']);
    
    
});
