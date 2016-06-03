@extends('layouts.areaRestrict')

@section('page-title', 'Controle de Acesso')
@section('x-title')Gerenciar perfil do usuário: {{$user->name}} @endsection

@section('conteudo')
    @can('user_add_role')
        {!! Form::open(['route'=>['admin.users.roles.store', $user->id]]) !!}
        <select name="role_id" class="form-control">
            @foreach($roles as $role)
                @if(!$user->hasRole($role->name))
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @endif
            @endforeach
        </select>
        <br>
        {!! Form::submit('Adicionar perfil', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    @endcan
    <br>

    <h3>Listando perfis:</h3>
    <table class="table table-hover">
        <thead>
        <th>Perfil</th>
        <th>Descrição</th>
        @can('user_revoke_role')
            <th>Ações</th>
        @endcan
        </thead>
        <tbody>
        @foreach($user->roles as $role)
            <tr>
                <td>{{$role->name}}</td>
                <td>{{$role->description}}</td>
                @can('user_revoke_role')
                    <td>
                        <a href="{{route('admin.users.roles.revoke',['id'=>$user->id, 'role_id'=>$role->id])}}"
                           class="btn btn-danger btn-xs">
                            <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Revoke
                        </a>
                    </td>
                @endcan
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{route('admin.users.index')}}" class="btn btn-default">Voltar</a>
@endsection
