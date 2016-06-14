@extends('layouts.areaRestrict')

@section('page-title', 'Menu de Agendamento') 
@section('x-title', 'Gerenciar agendamentos') 

@section('conteudo')

    @can('add_agendamento')
        <a href="{{route('admin.agendamentos.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo agendamento</a>
    @endcan
    <br><br>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif    
    <div class="table-responsive">
    <table class="table table-hover table-condensed">
        <thead>        
        <th>Usuário</th>
        <th>Agenda</th>
        <th>Data</th>
        <th>Termo</th>
        <th>Período</th>
        <th>Aulas</th>          
        {{-- 'Sem o campo de horario inicial e final - Sem o campo de comentario' --}} 
        <th>Ações</th>
        </thead>
        <tbody>
        @forelse($agendamentos as $agendamento)        
            <tr>            
                <td>{{$agendamento->user->name}}</td>
                <td>{{$agendamento->agenda->name}}</td>
                <td>{{ date('d/m/Y', strtotime($agendamento->data))}}</td>
                <td>{{$agendamento->termo}}º</td>
                <td>@if($agendamento->turno == 'M') MANHÃ @elseif($agendamento->turno == 'N') NOITE @else TARDE @endif</td>                
                <td>
                    @if(!empty($agendamento->aula1))
                    1ª
                    @endif
                    @if(!empty($agendamento->aula2))
                    2ª
                    @endif
                    @if(!empty($agendamento->aula3))
                    3ª
                    @endif
                    @if(!empty($agendamento->aula4))
                    4ª
                    @endif
                    @if(!empty($agendamento->aula5))
                    5ª
                    @endif
                </td>
                {{-- 'Sem o campo de horario inicial e final - Sem o campo de comentario' --}}
                <td>
                {{-- 'manage vem da policy de agendamento' --}}
                @can('manage', $agendamento)
                    <a href="{{route('admin.agendamentos.destroy',['id'=>$agendamento->id])}}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </a>
                @endcan
                </td>
            </tr>
            @empty
            <div class="alert alert-info" role="alert"><p><strong>Nenhum registro encontrado!</strong></p></div>
        @endforelse
        </tbody>
    </table>
    {{$agendamentos->render()}}
    </div>
@endsection