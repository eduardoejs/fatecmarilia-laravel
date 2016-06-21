@extends('layouts.areaRestrict')

@section('page-title', 'Gerenciamento de Cursos') 
@section('x-title', 'Cadastrar nova modalidade') 

@section('conteudo')
    {!! Form::open(['route'=>'admin.modalidades.cursos.store']) !!}                            
        @include('admin.academico.modalidades._form')
        {!! Form::submit('Adicionar', ['class'=>'btn btn-primary']) !!}
        <a href="{{route('admin.modalidades.cursos.index')}}" class='btn btn-default'>Voltar</a>
    {!! Form::close() !!} 
@endsection