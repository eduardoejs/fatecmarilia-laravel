@extends('layouts.areaRestrict')

@section('page-title', 'Controle de Acesso')
@section('x-title')Alterar perfil: {{$role->name}} @endsection

@section('conteudo')       
    {!! Form::model($role, ['route'=>['admin.roles.update', $role->id], 'method'=>'put']) !!}
        @include('admin.roles._form')
    {!! Form::submit('Gravar', ['class'=>'btn btn-primary']) !!}
    <a href="{{route('admin.roles.index')}}" class='btn btn-default'>Voltar</a>
    {!! Form::close() !!}   
@endsection