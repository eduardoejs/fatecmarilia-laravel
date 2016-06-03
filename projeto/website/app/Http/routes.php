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



Route::group(['middleware' => ['web']], function(){   
    Route::auth();
    Route::get('/', function(){
            return view('public.index');
    });    
    
    Route::get('/dashboard', ['as' => 'dashboard.home', 'uses' => 'HomeController@index']);    
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'web'], function(){    
    
    Route::get('users', ['as' => 'users.index', 'uses' => 'Admin\UsersController@index']);
    Route::get('users/new', ['as' => 'users.create', 'uses' => 'Admin\UsersController@create']);
    Route::post('users/search', ['as' => 'users.search', 'uses' => 'Admin\UsersController@search']);
    Route::post('users/store', ['as' => 'users.store', 'uses' => 'Admin\UsersController@store']);
    Route::get('users/edit/{id}', ['as' => 'users.edit', 'uses' => 'Admin\UsersController@edit']);
    Route::put('users/update/{id}', ['as' => 'users.update', 'uses' => 'Admin\UsersController@update']);
    Route::get('users/destroy/{id}', ['as' => 'users.destroy', 'uses' => 'Admin\UsersController@destroy']);
    Route::get('users/roles/{id}', ['as' => 'users.roles', 'uses' => 'Admin\UsersController@roles']);
    Route::post('users/roles/{id}/store', ['as' => 'users.roles.store', 'uses' => 'Admin\UsersController@storeRole']);
    Route::get('users/roles/{id}/revoke/{role_id}', ['as' => 'users.roles.revoke', 'uses' => 'Admin\UsersController@revokeRole']);        
    
    Route::get('roles', ['as' => 'roles.index', 'uses' => 'Admin\RolesController@index']);
    Route::get('roles/new', ['as' => 'roles.create', 'uses' => 'Admin\RolesController@create']);
    Route::post('roles/search', ['as' => 'roles.search', 'uses' => 'Admin\RolesController@search']);
    Route::post('roles/store', ['as' => 'roles.store', 'uses' => 'Admin\RolesController@store']);
    Route::get('roles/edit/{id}', ['as' => 'roles.edit', 'uses' => 'Admin\RolesController@edit']);
    Route::put('roles/update/{id}', ['as' => 'roles.update', 'uses' => 'Admin\RolesController@update']);
    Route::get('roles/destroy/{id}', ['as' => 'roles.destroy', 'uses' => 'Admin\RolesController@destroy']);
    Route::get('roles/permissions/{id}', ['as' => 'roles.permissions', 'uses' => 'Admin\RolesController@permissions']);
    Route::post('roles/permissions/{id}/store', ['as' => 'roles.permissions.store', 'uses' => 'Admin\RolesController@storePermission']);
    Route::get('roles/permissions/{id}/revoke/{permission_id}', ['as' => 'roles.permissions.revoke', 'uses' => 'Admin\RolesController@revokePermission']);
    
    Route::get('permissions', ['as' => 'permissions.index', 'uses' => 'Admin\PermissionsController@index']);
    Route::get('permissions/new', ['as' => 'permissions.create', 'uses' => 'Admin\PermissionsController@create']);
    Route::post('permissions/store', ['as' => 'permissions.store', 'uses' => 'Admin\PermissionsController@store']);
    Route::get('permissions/edit/{id}', ['as' => 'permissions.edit', 'uses' => 'Admin\PermissionsController@edit']);
    Route::put('permissions/update/{id}', ['as' => 'permissions.update', 'uses' => 'Admin\PermissionsController@update']);
    Route::get('permissions/destroy/{id}', ['as' => 'permissions.destroy', 'uses' => 'Admin\PermissionsController@destroy']);
});

