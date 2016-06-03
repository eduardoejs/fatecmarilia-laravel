@extends('layouts.areaRestrict')

@section('page-title', 'Controle de Acesso') 
@section('x-title', 'Cadastrar novo usuário') 

@section('conteudo')
    {!! Form::open(['route'=>'admin.users.store']) !!}                            
        @include('admin.users._form')
        {!! Form::submit('Gravar', ['class'=>'btn btn-primary']) !!}
        <a href="{{route('admin.users.index')}}" class='btn btn-default'>Voltar</a>
    {!! Form::close() !!} 
@endsection
