@extends('layouts.areaRestrict')

@section('page-title', 'Controle de Acesso')
@section('x-title')Alterar permissão: {{$permission->name}} @endsection

@section('conteudo')       
    {!! Form::model($permission, ['route'=>['admin.permissions.update', $permission->id], 'method'=>'put']) !!}
        @include('admin.permissions._form')
    {!! Form::submit('Gravar', ['class'=>'btn btn-primary']) !!}
    <a href="{{route('admin.permissions.index')}}" class='btn btn-default'>Voltar</a>
    {!! Form::close() !!}   
@endsection