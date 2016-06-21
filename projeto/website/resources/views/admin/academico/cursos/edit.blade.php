@extends('layouts.areaRestrict')

@section('page-title', 'Classificação dos Cursos') 
@section('x-title') Alterar classificação: {{$curso->descricao}} @endsection

@section('conteudo')
    {!! Form::model($curso, ['route'=>['admin.cursos.update', $curso->id], 'method' => 'put']) !!}                            
        @include('admin.academico.cursos._form')
        {!! Form::submit('Gravar', ['class'=>'btn btn-primary']) !!}
        <a href="{{route('admin.cursos.index')}}" class='btn btn-default'>Voltar</a>
    {!! Form::close() !!} 
@endsection