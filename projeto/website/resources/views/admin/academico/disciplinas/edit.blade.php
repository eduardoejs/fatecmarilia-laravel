@extends('layouts.areaRestrict')

@section('page-title', 'Gerenciamento de Disciplinas') 
@section('x-title') Alterar disciplina: {{$disciplina->nome}} @endsection

@section('conteudo')
    {!! Form::model($disciplina, ['route'=>['admin.disciplinas.update', $disciplina->id], 'method' => 'put']) !!}                            
        @include('admin.academico.disciplinas._form')
        {!! Form::submit('Gravar', ['class'=>'btn btn-primary']) !!}
        <a href="{{route('admin.disciplinas.index')}}" class='btn btn-default'>Voltar</a>
    {!! Form::close() !!} 
@endsection