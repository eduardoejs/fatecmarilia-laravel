@extends('layouts.areaRestrict')

@section('page-title', 'Controle de atribuição de Disciplinas') 
@section('x-title', 'Gerenciar atribuição entre Disciplinas e Docentes') 

@section('conteudo')
    
    <div class="col-md-12 col-sm-6 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Docentes <small>(Selecione um docente na lista abaixo)</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a></li>
                <li><a href="#">Settings 2</a></li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        
        <div class="x_content">
          <div class="col-md-10 col-sm-6 col-xs-6">
            <select name="docente_id" class="form-control" id="slDocentes">
              @foreach($docentes as $docente)
                <option value="{{$docente->id}}">{{$docente->nome}}</option>
              @endforeach
            </select>
          </div>
          <div>
            <button type="button" class="btn btn-primary btn-sm">
              <span class="glyphicon glyphicon-retweet" aria-hidden="true"></span> Atribuir
            </button>
          </div>                    
        </div>
      </div>
    </div>

    <!--<div class="clearfix"></div> -->    

    <div class="clearfix"></div>

    <div class="clearfix"></div>

    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Atrubuições <small>Listagem de atribuições de disciplinas</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Settings 1</a></li>
                <li><a href="#">Settings 2</a></li>
              </ul>
            </li>
            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
          </ul>
          <div class="clearfix"></div>
        </div>

        <div class="x_content">
          
          <div class="table-responsive">
            <table class="table table-striped" id="vinculos">
              <thead>

                <tr class="headings">
                  <th class="column-title">ID SIGA </th>
                  <th class="column-title">Disciplina</th>
                  <th class="column-title no-link last"><span class="nobr">Ações</span>
                  </th>                  
                </tr>

              </thead>

              <tbody id="location">                
                
              </tbody>
            </table>

          </div>
        </div>

      </div>
    </div>  
@endsection

@section('scripts')
@parent
<script type="text/javascript" src="/assets/agendamento/jquery.min.js"></script>
<script type="text/javascript" src="/assets/template-restrict/js/moment/moment.min.js"></script>
<script type="text/javascript" src="/assets/blockuiplugin/jquery.blockUI.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    
    window.onload = function() { $("select#slDocentes").trigger("change"); }

    $("select#slDocentes").change(function() {
      $.blockUI({ message: '<h2">Verificando dados...</h1>' });/*block UI*/
      var docenteId = $("select#slDocentes");
      var trHTML = '';
      $("#location").empty();//limpo o campo de dados

      $.get("atribuicao/check/" + docenteId.val(), function(dados){        
        $.each(dados, function(key,value){
          var url = '{{route('admin.disciplinas.vinculadas.destroy',['docenteId'=>':docente', 'disciplinaId'=>':disciplina' ])}}';
          url = url.replace(':docente', docenteId.val());
          url = url.replace(':disciplina', dados[key].id);
          
          trHTML += '<tr><td>' + dados[key].codigoDoSiga + '</td><td>' + dados[key].nome + '</td>' + '<td><a href="'+url+'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Remover"></span> </a></td>' + '</tr>';        
        });

        $('#location').append(trHTML);

      });
      $(document).ajaxStop($.unblockUI);  
    });    
  });
</script>
@endsection