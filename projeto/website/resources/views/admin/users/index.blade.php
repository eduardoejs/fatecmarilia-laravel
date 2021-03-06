@extends('layouts.areaRestrict')

@section('page-title', 'Controle de Acesso') 
@section('x-title', 'Gerenciar usuários cadastrados') 

@section('top-search')
    @parent
    {!! Form::open(['route'=>'admin.users.search']) !!}
    <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
                
                    <input type="text" name="search" class="form-control" placeholder="Pesquisar usuário" value="{{ isset($search) ? $search : '' }}">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </span>                
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@section('conteudo')

    @can('add_user')
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
        @forelse($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                @if ($user->active)
                    <td><span class="label label-success">Liberado</span></td>
                    @else
                    <td><span class="label label-danger">Bloqueado</span></td>
                @endif
                <td>
                    @can('view_user_roles')
                    <a href="{{route('admin.users.roles',['id'=>$user->id])}}" class="btn btn-default btn-xs">
                        <span class="glyphicon glyphicon-user" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Perfil do usuário"></span> 
                    </a>
                    @endcan

                    @can('edit_user')
                    <a href="{{route('admin.users.edit',['id'=>$user->id])}}" class="btn btn-warning btn-xs">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Alterar usuário"></span> 
                    </a>
                    @endcan                                        

                    @can('destroy_user')
                    <a href="{{route('admin.users.destroy',['id'=>$user->id])}}" class="btn @if($user->active)btn-danger @else btn-success @endif btn-xs">
                        <span class="@if($user->active)glyphicon glyphicon-ban-circle  @else glyphicon glyphicon-check @endif" @if($user->active) data-toggle="tooltip" data-placement="top" title="Bloquear usuário" @else data-toggle="tooltip" data-placement="top" title="Liberar usuário" @endif aria-hidden="true"></span>
                    </a>
                    @endcan
                </td>
            </tr>
        @empty
            <div class="alert alert-info" role="alert"><p><strong>Nenhum registro encontrado!</strong></p></div>
        @endforelse
        </tbody>
    </table>
@endsection