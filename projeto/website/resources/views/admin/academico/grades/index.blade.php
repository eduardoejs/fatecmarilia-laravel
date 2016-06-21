@extends('layouts.areaRestrict')

@section('page-title', 'Gerenciamento de Disciplinas') 
@section('x-title', 'Grades curriculares cadastradas') 

@section('conteudo')

    @can('add_grade')
        <a href="{{route('admin.grade.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Grade</a>        
    @endcan
    
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
        <th>Código SIGA</th>
        <th>Descrição</th>
        <th>Ações</th>
        </thead>
        <tbody>
        @forelse($grades as $grade)
            <tr>
                <td>{{$grade->codigoDoSiga}}</td>
                <td>{{$grade->descricao}}</td>
                <td> 
                @can('edit_grade')                   
                    <a href="{{route('admin.grade.edit',['id'=>$grade->id])}}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Alterar"></span></a>                    
                @endcan
                @can('destroy_grade')
                    <a href="{{route('admin.grade.destroy',['id'=>$grade->id])}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Remover"></span></a>
                @endcan
                </td>
            </tr>
            @empty
            <div class="alert alert-info" role="alert"><p><strong>Nenhum registro encontrado!</strong></p></div>
        @endforelse
        </tbody>
    </table>
@endsection