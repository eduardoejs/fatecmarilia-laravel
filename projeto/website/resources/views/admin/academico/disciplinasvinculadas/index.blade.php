@extends('layouts.areaRestrict')

@section('page-title', 'Controle de atribuição de Disciplinas') 
@section('x-title', 'Gerenciar atribuição entre Disciplinas e Docentes') 
@section('css')

@section('conteudo')
<!-- page content -->
  <div class="center" role="main">
    <div class="">
      <div class="clearfix"></div>
        @if (session('status'))
          <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
              {{ session('status') }}
          </div>
        @endif 
        @if (session('status-Erro'))
          <div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
              {{ session('status-Erro') }}
          </div>
        @endif
          
      {!! Form::open(['route'=>'admin.disciplinas.vinculadas.store']) !!}
      <div class="row">
        <div class="clearfix"></div>
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="x_panel">
            <div class="x_title">
              <h2>Docente</h2>                    
              <div class="clearfix"></div>
            </div>
            <select name="docente" class="form-control" id="slDocentes">
              @foreach($docentes as $docente)
                <option value="{{$docente->id}}">{{$docente->nome}}</option>
              @endforeach
            </select>
          </div>          
        </div>

        <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="x_panel">
            <div class="x_title">
              <h2>Cursos</h2>                    
              <div class="clearfix"></div>
            </div>                   
            {!! Form::select('curso', $cursos, null, ['class' => 'form-control', 'id' => 'slCursos']) !!}                    
          </div>          
        </div>

        <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="x_panel">
            <div class="x_title">
              <h2>Grade disciplinar</h2>                    
              <div class="clearfix"></div>
            </div>                   
            {!! Form::select('grade', [], null, ['class' => 'form-control', 'id' => 'slGrades']) !!}                    
          </div>          
        </div>
              
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="x_panel">
            <div class="x_title">
              <h2>Disciplinas</h2>                    
              <div class="clearfix"></div>
            </div>                    
            {!! Form::select('disciplina', [], null, ['class' => 'form-control']) !!}                  
          </div>          
        </div>
            
        <div class="col-md-12 col-sm-12 col-xs-12">                
          <div class="x_panel">                  
            {!! Form::submit('Vincular Docente à Disciplina', ['class' => 'btn btn-primary']) !!}
          </div>          
        </div>

        <div class="clearfix"></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2><small>Discipinas atribuídas</small></h2>                    
              <div class="clearfix"></div>
            </div>

            <div class="x_content">
              <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                  <thead>
                    <tr class="headings">                            
                      <th class="column-title">#</th>
                        <th class="column-title">Disciplina </th>
                        <th class="column-title">ID Siga </th>                            
                        <th class="column-title">Grade </th>
                        <th class="column-title">Curso </th>                            
                        <th class="column-title">Ações </th>
                      </tr>
                  </thead>
                  <tbody id="table-vinculos">
                  </tbody>
                </table>
              </div>
            </div>                
          </div>
        </div>            
      </div>             
    </div>
    {!! Form::close() !!}
  </div>
  <!-- /page content -->

@endsection

@section('scripts')
<!-- jQuery -->
    <script src="/assets/template-restrict/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/assets/template-restrict/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/assets/template-restrict/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/assets/template-restrict/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="/assets/template-restrict/vendors/iCheck/icheck.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="/assets/template-restrict/build/js/custom.min.js"></script>

    <script type="text/javascript" src="/assets/blockuiplugin/jquery.blockUI.js"></script>

    <script type="text/javascript">

      $(document).ready(function(){
        
        window.onload = function(){ $('#slCursos').change(); $('#slDocentes').change(); }

        $('select[name=docente]').change(function(){          
          var idDocente = $(this).val();          
          
          $.get('getatribuicoes/' + idDocente, function(vinculos){
            $('#table-vinculos').empty(); 
            $.each(vinculos, function(key, value){              
              $('#table-vinculos').append('<tr><td>' + value.id  + '</td><td>' + value.disciplina + '</td><td>' + value.codSiga + '</td><td>' + value.grade + '</td><td>' + value.curso +'</td><td><a href="atribuicao/destroy/docente/'+idDocente+'/disciplina/'+value.id+'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Remover"></span></a></td></tr>')    
            });  
          });         
          
        });

        $('select[name=curso]').change(function(){
          //$.blockUI({ message: '<h1">Aguarde...</h1>' });
          var idCurso = $(this).val();          
          
          $.get('getgrades/' + idCurso, function(grades){
            $('select[name=grade]').empty();
            $.each(grades, function(key, value){
              $('select[name=grade]').append('<option value= '+ value.id + '>[' + value.codigoDoSiga + "]  " + value.descricao +'</option>');
            });          
            //$(document).ajaxStop($.unblockUI); 
            $('#slGrades').change();
          });
        });

        $('select[name=grade]').change(function(){
          //$.blockUI({ message: '<h1">Aguarde...</h1>' });
          var idCurso = $('select[name=curso]').val();
          var idGrade = $('#slGrades');          
                    
            $.get('getdisciplinas/' + idCurso + '/' + idGrade.val(), function(disciplinas){
              $('select[name=disciplina]').empty();
              $.each(disciplinas, function(key, value){
                $('select[name=disciplina]').append('<option value= '+ value.id + '>[' + value.codigoDoSiga + "]  " + value.nome +'</option>');
              });          
              //$(document).ajaxStop($.unblockUI); 
            });
        });

      });
    </script>
@endsection