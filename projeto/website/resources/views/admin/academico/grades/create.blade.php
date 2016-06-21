@extends('layouts.areaRestrict')

@section('page-title', 'Gerenciamento de Disciplinas') 
@section('x-title', 'Cadastrar nova grade curricular') 

@section('conteudo')
    {!! Form::open(['route'=>'admin.grade.store']) !!}                            
        @include('admin.academico.grades._form')
        {!! Form::submit('Adicionar', ['class'=>'btn btn-primary']) !!}
        <a href="{{route('admin.grade.index')}}" class='btn btn-default'>Voltar</a>
    {!! Form::close() !!} 
@endsection