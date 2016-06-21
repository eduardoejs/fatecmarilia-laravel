@extends('layouts.areaRestrict')

@section('page-title', 'Classificação dos Cursos') 
@section('x-title') Alterar classificação: {{$modalidade->descricao}} @endsection

@section('conteudo')
    {!! Form::model($modalidade, ['route'=>['admin.modalidades.cursos.update', $modalidade->id], 'method' => 'put']) !!}                            
        @include('admin.academico.modalidades._form')
        {!! Form::submit('Gravar', ['class'=>'btn btn-primary']) !!}
        <a href="{{route('admin.modalidades.cursos.index')}}" class='btn btn-default'>Voltar</a>
    {!! Form::close() !!} 
@endsection