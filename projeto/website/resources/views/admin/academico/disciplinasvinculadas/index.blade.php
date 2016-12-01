@extends('layouts.areaRestrict')

@section('page-title', 'Controle de atribuição de Disciplinas') 
@section('x-title', 'Gerenciar atribuição entre Disciplinas e Docentes') 
@section('css')

<!-- Bootstrap -->
    <link href="/assets/template-restrict/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/assets/template-restrict/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/assets/template-restrict/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/assets/template-restrict/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/assets/template-restrict/build/css/custom.min.css" rel="stylesheet">
@endsection

@section('conteudo')
    

    <!-- page content -->
        <div class="center" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
                            
              <div class="clearfix"></div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Docente</h2>                    
                    <div class="clearfix"></div>
                  </div>
                  <select name="docente_id" class="form-control" id="slDocentes">
                    @foreach($docentes as $docente)
                      <option value="{{$docente->id}}">{{$docente->nome}}</option>
                    @endforeach
                  </select>
                </div>          
              </div>


              <div class="clearfix"></div>


              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Disciplinas atribuídas</h2>                    
                    <div class="clearfix"></div>
                  </div>


                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>
                              <small>Atribuir</small>
                            </th>
                            <th class="column-title">#</th>
                            <th class="column-title">Disciplina </th>
                            <th class="column-title">ID Siga </th>                            
                            <th class="column-title">Grade </th>
                            <th class="column-title">Curso </th>                            
                            </th>                            
                          </tr>
                        </thead>

                        <tbody>
                          @foreach($disciplinas as $disciplina)
                            <tr class="even pointer">
                              <td class="a-center ">
                                @if ($disciplina->id == 1)
                                <input type="checkbox" class="flat" name="table_records" checked="true">
                                @else
                                <input type="checkbox" class="flat" name="table_records">
                                @endif
                                  
                              </td>
                              <td class=" ">{{$disciplina->id}}</td>
                              <td class=" ">{{$disciplina->nome}}</td>
                              <td class=" ">{{$disciplina->codigoDoSiga}}</td>                              
                              <td class=" ">{{$disciplina->grade_disciplina->codigoDoSiga}}</td>
                              <td class=" ">{{$disciplina->curso->nome}}</td>                                                         
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

@endsection

@section('scripts')
@parent
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
@endsection