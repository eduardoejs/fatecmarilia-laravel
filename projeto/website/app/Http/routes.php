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

Route::group(['prefix' => 'dashboard', 'as' => 'admin.', 'middleware' => 'web'], function(){    
    
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
    Route::post('permissions/search', ['as' => 'permissions.search', 'uses' => 'Admin\PermissionsController@search']);
    Route::post('permissions/store', ['as' => 'permissions.store', 'uses' => 'Admin\PermissionsController@store']);
    Route::get('permissions/edit/{id}', ['as' => 'permissions.edit', 'uses' => 'Admin\PermissionsController@edit']);
    Route::put('permissions/update/{id}', ['as' => 'permissions.update', 'uses' => 'Admin\PermissionsController@update']);
    Route::get('permissions/destroy/{id}', ['as' => 'permissions.destroy', 'uses' => 'Admin\PermissionsController@destroy']);

    Route::get('agendas', ['as' => 'agendas.index', 'uses' => 'Agendamento\AgendasController@index']);
    Route::get('agendas/new', ['as' => 'agendas.create', 'uses' => 'Agendamento\AgendasController@create']);
    Route::post('agendas/search', ['as' => 'agendas.search', 'uses' => 'Agendamento\AgendasController@search']);
    Route::post('agendas/store', ['as' => 'agendas.store', 'uses' => 'Agendamento\AgendasController@store']);
    Route::get('agendas/edit/{id}', ['as' => 'agendas.edit', 'uses' => 'Agendamento\AgendasController@edit']);
    Route::put('agendas/update/{id}', ['as' => 'agendas.update', 'uses' => 'Agendamento\AgendasController@update']);
    Route::get('agendas/destroy/{id}', ['as' => 'agendas.destroy', 'uses' => 'Agendamento\AgendasController@destroy']);

    Route::get('agendamentos', ['as' => 'agendamentos.index', 'uses' => 'Agendamento\AgendamentosController@index']);
    Route::get('agendamentos/new', ['as' => 'agendamentos.create', 'uses' => 'Agendamento\AgendamentosController@create']);
    Route::post('agendamentos/search', ['as' => 'agendamentos.search', 'uses' => 'Agendamento\AgendamentosController@search']);
    Route::post('agendamentos/store', ['as' => 'agendamentos.store', 'uses' => 'Agendamento\AgendamentosController@store']);    
    Route::get('agendamentos/destroy/{id}', ['as' => 'agendamentos.destroy', 'uses' => 'Agendamento\AgendamentosController@destroy']);
    Route::get('agendamentos/check/{data}/{turno}/{agenda}', ['as' => 'agendamentos.check', 'uses' => 'Agendamento\AgendamentosController@getAgendamentos']);   

    Route::get('cursos/classificacao', ['as' => 'tipos.cursos.index', 'uses' => 'Academico\TiposCursosController@index']);
    Route::get('cursos/classificacao/new', ['as' => 'tipos.cursos.create', 'uses' => 'Academico\TiposCursosController@create']);
    Route::post('cursos/classificacao/search', ['as' => 'tipos.cursos.search', 'uses' => 'Academico\TiposCursosController@search']);
    Route::post('cursos/classificacao/store', ['as' => 'tipos.cursos.store', 'uses' => 'Academico\TiposCursosController@store']);    
    Route::get('cursos/classificacao/edit/{id}', ['as' => 'tipos.cursos.edit', 'uses' => 'Academico\TiposCursosController@edit']);
    Route::put('cursos/classificacao/update/{id}', ['as' => 'tipos.cursos.update', 'uses' => 'Academico\TiposCursosController@update']);
    Route::get('cursos/classificacao/destroy/{id}', ['as' => 'tipos.cursos.destroy', 'uses' => 'Academico\TiposCursosController@destroy']);    

    Route::get('cursos', ['as' => 'cursos.index', 'uses' => 'Academico\CursosController@index']);
    Route::get('cursos/new', ['as' => 'cursos.create', 'uses' => 'Academico\CursosController@create']);
    Route::post('cursos/search', ['as' => 'cursos.search', 'uses' => 'Academico\CursosController@search']);
    Route::post('cursos/store', ['as' => 'cursos.store', 'uses' => 'Academico\CursosController@store']);    
    Route::get('cursos/edit/{id}', ['as' => 'cursos.edit', 'uses' => 'Academico\CursosController@edit']);
    Route::put('cursos/update/{id}', ['as' => 'cursos.update', 'uses' => 'Academico\CursosController@update']);
    Route::get('cursos/destroy/{id}', ['as' => 'cursos.destroy', 'uses' => 'Academico\CursosController@destroy']);    

    Route::get('modalidades/cursos', ['as' => 'modalidades.cursos.index', 'uses' => 'Academico\ModalidadesController@index']);
    Route::get('modalidades/cursos/new', ['as' => 'modalidades.cursos.create', 'uses' => 'Academico\ModalidadesController@create']);    
    Route::post('modalidades/cursos/store', ['as' => 'modalidades.cursos.store', 'uses' => 'Academico\ModalidadesController@store']);    
    Route::get('modalidades/cursos/edit/{id}', ['as' => 'modalidades.cursos.edit', 'uses' => 'Academico\ModalidadesController@edit']);
    Route::put('modalidades/cursos/update/{id}', ['as' => 'modalidades.cursos.update', 'uses' => 'Academico\ModalidadesController@update']);
    Route::get('modalidades/cursos/destroy/{id}', ['as' => 'modalidades.cursos.destroy', 'uses' => 'Academico\ModalidadesController@destroy']);    

    Route::get('grade/', ['as' => 'grade.index', 'uses' => 'Academico\GradeDisciplinasController@index']);
    Route::get('grade/new', ['as' => 'grade.create', 'uses' => 'Academico\GradeDisciplinasController@create']);    
    Route::post('grade/store', ['as' => 'grade.store', 'uses' => 'Academico\GradeDisciplinasController@store']);    
    Route::get('grade/edit/{id}', ['as' => 'grade.edit', 'uses' => 'Academico\GradeDisciplinasController@edit']);
    Route::put('grade/update/{id}', ['as' => 'grade.update', 'uses' => 'Academico\GradeDisciplinasController@update']);
    Route::get('grade/destroy/{id}', ['as' => 'grade.destroy', 'uses' => 'Academico\GradeDisciplinasController@destroy']);

    Route::get('disciplina/', ['as' => 'disciplinas.index', 'uses' => 'Academico\DisciplinasController@index']);
    Route::get('disciplina/new', ['as' => 'disciplinas.create', 'uses' => 'Academico\DisciplinasController@create']);    
    Route::post('disciplina/store', ['as' => 'disciplinas.store', 'uses' => 'Academico\DisciplinasController@store']);    
    Route::get('disciplina/edit/{id}', ['as' => 'disciplinas.edit', 'uses' => 'Academico\DisciplinasController@edit']);
    Route::put('disciplina/update/{id}', ['as' => 'disciplinas.update', 'uses' => 'Academico\DisciplinasController@update']);
    Route::get('disciplina/destroy/{id}', ['as' => 'disciplinas.destroy', 'uses' => 'Academico\DisciplinasController@destroy']);
    Route::post('disciplina/search', ['as' => 'disciplinas.search', 'uses' => 'Academico\DisciplinasController@search']);

    Route::get('docentes/', ['as' => 'docentes.index', 'uses' => 'Academico\DocentesController@index']);
    Route::get('docentes/new', ['as' => 'docentes.create', 'uses' => 'Academico\DocentesController@create']);    
    Route::post('docentes/store', ['as' => 'docentes.store', 'uses' => 'Academico\DocentesController@store']);    
    Route::get('docentes/edit/{id}', ['as' => 'docentes.edit', 'uses' => 'Academico\DocentesController@edit']);
    Route::put('docentes/update/{id}', ['as' => 'docentes.update', 'uses' => 'Academico\DocentesController@update']);
    Route::get('docentes/destroy/{id}', ['as' => 'docentes.destroy', 'uses' => 'Academico\DocentesController@destroy']);
    Route::post('docentes/search', ['as' => 'docentes.search', 'uses' => 'Academico\DocentesController@search']);
});


