@extends('layouts.areaRestrict')

@section('page-title', 'Controle de Acesso') 
@section('x-title', 'Cadastrar novo perfil') 

@section('conteudo')
    {!! Form::open(['route'=>'admin.roles.store']) !!}                            
        @include('admin.roles._form')
        {!! Form::submit('Adicionar perfil', ['class'=>'btn btn-primary']) !!}
        <a href="{{route('admin.roles.index')}}" class='btn btn-default'>Voltar</a>
    {!! Form::close() !!} 
@endsection