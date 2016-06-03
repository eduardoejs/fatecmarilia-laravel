@extends('layouts.areaRestrict')

@section('page-title', 'Controle de Acesso') 
@section('x-title', 'Gerenciar usuários cadastrados') 

@section('top-search')
    @parent
    {!! Form::open(['route'=>'admin.users.search']) !!}
    <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
                
                    <input type="text" name="search" class="form-control" placeholder="Pesquisar usuário">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </span>                
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@section('conteudo')

    @can('user_add')
        <a href="{{route('admin.users.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo usuário</a>
    @endcan
    <br><br>
    <table class="table table-hover">
        <thead>
            <th>Nome</th>
            <th>Email</th>
            <th>Status</th>
            <th>Ações</th>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                @if ($user->active)
                    <td><span class="label label-success">Ativo</span></td>
                    @else
                    <td><span class="label label-danger">Inativo</span></td>
                @endif
                <td>
                    @can('user_view_roles')
                    <a href="{{route('admin.users.roles',['id'=>$user->id])}}" class="btn btn-default btn-xs">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Perfil
                    </a>
                    @endcan

                    @can('user_edit')
                    <a href="{{route('admin.users.edit',['id'=>$user->id])}}" class="btn btn-warning btn-xs">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar
                    </a>
                    @endcan                                        

                    @can('user_destroy')
                    <a href="{{route('admin.users.destroy',['id'=>$user->id])}}" class="btn @if($user->active)btn-danger @else btn-success @endif btn-xs">
                        <span class="glyphicon @if($user->active)glyphicon-ban-circle @else glyphicon-check @endif" aria-hidden="true"></span> @if($user->active)Bloquear @else Liberar @endif
                    </a>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection