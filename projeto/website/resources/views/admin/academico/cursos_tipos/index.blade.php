@extends('layouts.areaRestrict')

@section('page-title', 'Classificação dos Cursos') 
@section('x-title', 'Classificações cadastradas') 

@section('top-search')
    @parent
    {!! Form::open(['route'=>'admin.tipos.cursos.search']) !!}
    <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
                
                    <input type="text" name="search" class="form-control" placeholder="Pesquisar" value="{{ isset($search) ? $search : '' }}">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                    </span>                
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

@section('conteudo')

    @can('add_tipo_curso')
        <a href="{{route('admin.tipos.cursos.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nova classificação</a>
    @endcan
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
            {{ session('status') }}
        </div>
    @endif 
    <br><br>
    <table class="table table-hover">
        <thead>
        <th>Descrição</th>        
        <th>Ações</th>
        </thead>
        <tbody>
        @forelse($tipos as $tipo)
            <tr>
                <td>{{$tipo->descricao}}</td>                
                <td> 
                @can('edit_tipo_curso')                   
                    <a href="{{route('admin.tipos.cursos.edit',['id'=>$tipo->id])}}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Alterar"></span></a>                    
                @endcan
                @can('destroy_tipo_curso')
                    <a href="{{route('admin.tipos.cursos.destroy',['id'=>$tipo->id])}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Remover"></span></a>
                @endcan
                </td>
            </tr>
            @empty
            <div class="alert alert-info" role="alert"><p><strong>Nenhum registro encontrado!</strong></p></div>
        @endforelse
        </tbody>
    </table>
@endsection