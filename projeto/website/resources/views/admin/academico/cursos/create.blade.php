@extends('layouts.areaRestrict')

@section('page-title', 'Classificação dos Cursos') 
@section('x-title', 'Cadastrar nova classificação') 

@section('conteudo')
    {!! Form::open(['route'=>'admin.tipos.cursos.store']) !!}                            
        @include('admin.academico.cursos_tipos._form')
        {!! Form::submit('Adicionar', ['class'=>'btn btn-primary']) !!}
        <a href="{{route('admin.tipos.cursos.index')}}" class='btn btn-default'>Voltar</a>
    {!! Form::close() !!} 
@endsection