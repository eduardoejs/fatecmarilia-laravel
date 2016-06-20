@extends('layouts.areaRestrict')

@section('page-title', 'Classificação dos Cursos') 
@section('x-title') Alterar classificação: {{$tipo->descricao}} @endsection

@section('conteudo')
    {!! Form::model($tipo, ['route'=>['admin.tipos.cursos.update', $tipo->id], 'method' => 'put']) !!}                            
        @include('admin.academico.cursos_tipos._form')
        {!! Form::submit('Gravar', ['class'=>'btn btn-primary']) !!}
        <a href="{{route('admin.tipos.cursos.index')}}" class='btn btn-default'>Voltar</a>
    {!! Form::close() !!} 
@endsection