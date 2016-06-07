@extends('layouts.areaRestrict')

@section('page-title', 'Controle de Acesso') 
@section('x-title', 'Cadastrar nova permissão') 

@section('conteudo')
    {!! Form::open(['route'=>'admin.permissions.store']) !!}                            
        @include('admin.permissions._form')
        {!! Form::submit('Adicionar permissão', ['class'=>'btn btn-primary']) !!}
        <a href="{{route('admin.permissions.index')}}" class='btn btn-default'>Voltar</a>
    {!! Form::close() !!} 
@endsection