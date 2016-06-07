@extends('layouts.areaRestrict')

@section('page-title', 'Controle de Acesso') 
@section('x-title', 'Gerenciar perfil de acesso') 

@section('top-search')
    @parent
    {!! Form::open(['route'=>'admin.roles.search']) !!}
    <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
                
                    <input type="text" name="search" class="form-control" placeholder="Pesquisar perfil" value="{{ isset($search) ? $search : '' }}">
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
        <a href="{{route('admin.roles.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo perfil</a>
    @endcan
    <br><br>
    <table class="table table-hover">
        <thead>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Ações</th>
        </thead>
        <tbody>
        @forelse($roles as $role)
            <tr>
                <td>{{$role->name}}</td>
                <td>{{$role->description}}</td>
                <td>                    
                    <a href="{{route('admin.roles.edit',['id'=>$role->id])}}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</a>
                    <a href="{{route('admin.roles.permissions',['id'=>$role->id])}}" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-tags" aria-hidden="true"></span> Permissoes</a>
                    <a href="{{route('admin.roles.destroy',['id'=>$role->id])}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Remover</a>
                </td>
            </tr>
            @empty
            <div class="alert alert-info" role="alert"><p><strong>Nenhum registro encontrado!</strong></p></div>
        @endforelse
        </tbody>
    </table>
@endsection