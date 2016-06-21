@extends('layouts.areaRestrict')

@section('page-title', 'Gerenciamento de Disciplinas') 
@section('x-title', 'Cadastrar nova disciplina') 

@section('conteudo')
    {!! Form::open(['route'=>'admin.disciplinas.store']) !!}                            
        @include('admin.academico.disciplinas._form')
        {!! Form::submit('Adicionar', ['class'=>'btn btn-primary']) !!}
        <a href="{{route('admin.disciplinas.index')}}" class='btn btn-default'>Voltar</a>
    {!! Form::close() !!} 
@endsection