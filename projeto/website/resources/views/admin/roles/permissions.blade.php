@extends('layouts.areaRestrict')

@section('page-title', 'Perfil de Acesso')
@section('x-title')Gerenciar permissões do perfil: {{$role->name}} @endsection

@section('conteudo')
    {!! Form::open(['route'=>['admin.roles.permissions.store', $role->id]]) !!}
        <select name="permission_id" class="form-control">
            @foreach($permissions as $permission)
                <option value="{{$permission->id}}">{{$permission->description}}</option>
            @endforeach
        </select>
        <br>
        {!! Form::submit('Adicionar permissao', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
        <br>
        <table class="table table-hover">
            <thead>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ações</th>
            </thead>
            <tbody>
            @foreach($role->permissions as $permission)
                <tr>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->description}}</td>
                    <td>
                        <a href="{{route('admin.roles.permissions.revoke', ['id'=>$role->id, 'permission_id'=>$permission->id])}}"
                           class="btn btn-danger btn-xs">Revoke</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{route('admin.roles.index')}}" class="btn btn-default">Voltar</a>
@endsection