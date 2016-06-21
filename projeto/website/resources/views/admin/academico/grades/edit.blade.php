@extends('layouts.areaRestrict')

@section('page-title', 'Gerenciamento de Disciplinas') 
@section('x-title') Alterar grade de disciplina: {{$grade->codigoDoSiga}} @endsection

@section('conteudo')
    {!! Form::model($grade, ['route'=>['admin.grade.update', $grade->id], 'method' => 'put']) !!}                            
        @include('admin.academico.grades._form')
        {!! Form::submit('Gravar', ['class'=>'btn btn-primary']) !!}
        <a href="{{route('admin.grade.index')}}" class='btn btn-default'>Voltar</a>
    {!! Form::close() !!} 
@endsection