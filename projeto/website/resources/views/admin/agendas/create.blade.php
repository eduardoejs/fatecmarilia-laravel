@extends('layouts.areaRestrict')

@section('page-title', 'Menu Agendamento') 
@section('x-title', 'Cadastrar nova agenda') 

@section('conteudo')
    {!! Form::open(['route'=>'admin.agendas.store']) !!}                            
        @include('admin.agendas._form')
        {!! Form::submit('Adicionar agenda', ['class'=>'btn btn-primary']) !!}
        <a href="{{route('admin.agendas.index')}}" class='btn btn-default'>Voltar</a>
    {!! Form::close() !!} 
@endsection