@extends('layouts.areaRestrict')

@section('page-title', 'Gerenciamento de Docentes') 
@section('x-title', 'Docentes cadastrados') 

@section('top-search')
    @parent
    {!! Form::open(['route'=>'admin.docentes.search']) !!}
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
    
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
            {{ session('status') }}
        </div>
    @endif 
     @if (session('status-Erro'))
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
            {{ session('status-Erro') }}
        </div>
    @endif 
    <br><br>
    <table class="table table-hover">
        <thead>        
        <th>Nome</th>
        <th>Titulação</th>
        <th>Sexo</th>        
        <th>E-Mail</th>
        <th>Lattes</th>
        <th>Ações</th>
        </thead>
        <tbody>
        @forelse($docentes as $docente)
            <tr>
                <td>{{$docente->nome}}</td>
                <td>{{$docente->titulacao}}</td>
                <td>{{$docente->sexo}}</td>
                <td>{{$docente->email}}</td>
                <td>{{$docente->urlLattes}}</td>                
                <td> 
                @can('edit_docente')                   
                    <a href="{{route('admin.docentes.edit',['id'=>$docente->id])}}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Alterar"></span></a>                    
                @endcan
                @can('destroy_docente')
                    <a href="{{route('admin.docentes.destroy',['id'=>$docente->id])}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Remover"></span></a>
                @endcan
                </td>
            </tr>
            @empty
            <div class="alert alert-info" role="alert"><p><strong>Nenhum registro encontrado!</strong></p></div>
        @endforelse
        </tbody>
    </table>
    {{$docentes->render()}}
@endsection