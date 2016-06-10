@extends('layouts.areaRestrict')

@section('page-title', 'Menu de Agendamento') 
@section('x-title', 'Agendas cadastradas') 

@section('top-search')
    @parent
    {!! Form::open(['route'=>'admin.agendas.search']) !!}
    <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
                
                    <input type="text" name="search" class="form-control" placeholder="Pesquisar agenda" value="{{ isset($search) ? $search : '' }}">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </span>                
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@section('conteudo')

    @can('add_agenda')
        <a href="{{route('admin.agendas.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nova Agenda</a>
    @endcan
    <br><br>
    <table class="table table-hover">
        <thead>
        <th>Nome</th>
        <th>Dias Antecedência</th>
        <th>Ações</th>
        </thead>
        <tbody>
        @forelse($agendas as $agenda)
            <tr>
                <td>{{$agenda->name}}</td>
                <td>{{$agenda->diasAntecedencia}}</td>
                <td> 
                @can('edit_agenda')                   
                    <a href="{{route('admin.agendas.edit',['id'=>$agenda->id])}}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar</a>                    
                @endcan
                @can('destroy_agenda')
                    <a href="{{route('admin.agendas.destroy',['id'=>$agenda->id])}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Remover</a>
                @endcan
                </td>
            </tr>
            @empty
            <div class="alert alert-info" role="alert"><p><strong>Nenhum registro encontrado!</strong></p></div>
        @endforelse
        </tbody>
    </table>
@endsection