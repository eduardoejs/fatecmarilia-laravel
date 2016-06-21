@extends('layouts.areaRestrict')

@section('page-title', 'Gerenciamento de Cursos') 
@section('x-title', 'Cursos cadastrados') 

@section('top-search')
    @parent
    {!! Form::open(['route'=>'admin.cursos.search']) !!}
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

    @can('add_curso')
        <a href="{{route('admin.cursos.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Curso</a>
        <a href="{{route('admin.modalidades.cursos.index')}}" class="btn btn-default"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Modalidade</a>
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
        <th>Nome do Curso</th>        
        <th>Carga Horária</th>
        <th>Tempo de Duração</th>
        <th>Tipo de Curso</th>
        <th>Modalidade</th>
        <th>Ações</th>
        </thead>
        <tbody>
        @forelse($cursos as $curso)
            <tr>
                <td>{{$curso->nome}}</td>                
                <td>{{$curso->cargaHoraria}}</td>                
                <td>{{$curso->tempoDuracao}} anos</td>                
                <td>{{$curso->tipo_curso->descricao}}</td>                
                <td>{{$curso->modalidade->descricao}}</td>
                <td> 
                @can('edit_curso')                   
                    <a href="{{route('admin.cursos.edit',['id'=>$curso->id])}}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Alterar"></span></a>                    
                @endcan
                @can('destroy_curso')
                    <a href="{{route('admin.cursos.destroy',['id'=>$curso->id])}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Remover"></span></a>
                @endcan
                </td>
            </tr>
            @empty
            <div class="alert alert-info" role="alert"><p><strong>Nenhum registro encontrado!</strong></p></div>
        @endforelse
        </tbody>
    </table>
@endsection