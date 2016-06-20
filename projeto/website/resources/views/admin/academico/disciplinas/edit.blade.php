@extends('layouts.areaRestrict')

@section('page-title', 'Menu Agendamento') 
@section('x-title') Alterar agenda: {{$agenda->name}} @endsection

@section('conteudo')
    {!! Form::model($agenda, ['route'=>['admin.agendas.update', $agenda->id], 'method' => 'put']) !!}                            
        @include('admin.agendas._form')
        {!! Form::submit('Gravar', ['class'=>'btn btn-primary']) !!}
        <a href="{{route('admin.agendas.index')}}" class='btn btn-default'>Voltar</a>
    {!! Form::close() !!} 
@endsection