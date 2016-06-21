@extends('layouts.areaRestrict')

@section('page-title', 'Gerenciamento de Cursos') 
@section('x-title', 'Modalidades de cursos cadastrados') 

@section('conteudo')

    @can('add_modalidade')
        <a href="{{route('admin.modalidades.cursos.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Modalidade</a>
    @endcan    
        <a href="{{route('admin.cursos.index')}}" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Voltar para cursos</a>
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
        <th>Modalidade</th>
        <th>Ações</th>
        </thead>
        <tbody>
        @forelse($modalidades as $modalidade)
            <tr>
                <td>{{$modalidade->descricao}}</td>                                
                <td> 
                @can('edit_modalidade')                   
                    <a href="{{route('admin.modalidades.cursos.edit',['id'=>$modalidade->id])}}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Alterar"></span></a>                    
                @endcan
                @can('destroy_modalidade')
                    <a href="{{route('admin.modalidades.cursos.destroy',['id'=>$modalidade->id])}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Remover"></span></a>
                @endcan
                </td>
            </tr>
            @empty
            <div class="alert alert-info" role="alert"><p><strong>Nenhum registro encontrado!</strong></p></div>
        @endforelse
        </tbody>
    </table>
@endsection