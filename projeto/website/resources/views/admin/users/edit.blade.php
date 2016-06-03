@extends('layouts.areaRestrict')

@section('page-title', 'Controle de Acesso')
@section('x-title')Alterar dados do usuário: {{$user->name}} @endsection

@section('conteudo')       
    {!! Form::model($user, ['route'=>['admin.users.update', $user->id], 'method'=>'put']) !!}
        @include('admin.users._form')
    {!! Form::submit('Gravar', ['class'=>'btn btn-primary']) !!}
    <a href="{{route('admin.users.index')}}" class='btn btn-default'>Voltar</a>
    {!! Form::close() !!}   
@endsection