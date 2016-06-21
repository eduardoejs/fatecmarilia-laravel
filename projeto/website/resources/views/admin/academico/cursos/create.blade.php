@extends('layouts.areaRestrict')

@section('page-title', 'Gerenciamento de Cursos') 
@section('x-title', 'Cadastrar novo curso') 

@section('conteudo')
    {!! Form::open(['route'=>'admin.cursos.store']) !!}                            
        @include('admin.academico.cursos._form')
        {!! Form::submit('Adicionar', ['class'=>'btn btn-primary']) !!}
        <a href="{{route('admin.cursos.index')}}" class='btn btn-default'>Voltar</a>
    {!! Form::close() !!} 
@endsection