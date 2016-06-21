@extends('layouts.areaRestrict')

@section('page-title', 'Gerenciamento de Docentes') 
@section('x-title') Alterar docente: {{$docente->nome}} @endsection

@section('conteudo')
    {!! Form::model($docente, ['route'=>['admin.docentes.update', $docente->id], 'method' => 'put']) !!}                            
        @include('admin.academico.docentes._form')
        {!! Form::submit('Gravar', ['class'=>'btn btn-primary']) !!}
        <a href="{{route('admin.docentes.index')}}" class='btn btn-default'>Voltar</a>
    {!! Form::close() !!} 
@endsection