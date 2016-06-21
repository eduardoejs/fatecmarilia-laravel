<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fatec Marília</title>

@section('css')
    <!-- Bootstrap -->
    <link href="/assets/template-restrict/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/assets/template-restrict/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/assets/template-restrict/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="/assets/template-restrict/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- jVectorMap -->
    <link href="/assets/template-restrict/css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>
@show
    <!-- Custom Theme Style -->
    <link href="/assets/template-restrict/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{route('dashboard.home')}}" class="site_title"><i class="fa fa-graduation-cap"></i> <span>Fatec Marília</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile">
                      <div class="profile_pic">
                        <img src="/assets/template-restrict/images/img.jpg" alt="..." class="img-circle profile_img">
                      </div>
                      <div class="profile_info">
                        <span>Bem vindo,</span>
                        <h2>{{ Auth::user()->name }}</h2>
                      </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>Dashboard</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                  <ul class="nav child_menu">
                                    <li><a href="{{route('dashboard.home')}}">Página inicial</a></li>                                    
                                  </ul>
                                </li>                  
                            </ul>
                        </div>

                        <div class="menu_section">
                            <h3>Meu Painel</h3>
                            <ul class="nav side-menu">
                                @if(Gate::allows('role_admin') or Gate::allows('permission_admin'))
                                <li><a><i class="fa fa-unlock-alt"></i> Controle de Acesso <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                            @can('role_admin')
                                            <li><a href="{{route('admin.users.index')}}">Usuários do Sistema</a></li>
                                            <li><a href="{{route('admin.roles.index')}}">Perfis de Acesso</a></li>
                                            @endcan
                                            @can('permission_admin')
                                            <li><a href="{{route('admin.permissions.index')}}">Permissões</a></li>
                                            @endcan
                                        
                                    </ul>
                                </li>
                                @endif
                                
                                <li><a><i class="fa fa-calendar"></i> Menu de Agendamento<span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                    @can('list_agenda')
                                      <li><a href="{{route('admin.agendas.index')}}">Agendas</a></li>
                                    @endcan
                                    @can('list_agendamento')
                                      <li><a href="{{route('admin.agendamentos.index')}}">Agendamentos</a></li>
                                    @endcan
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-building-o"></i> Estágios <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu"> 
                                        <li><a>Não Supervisionado<span class="fa fa-chevron-down"></span></a>
                                          <ul class="nav child_menu">
                                              <li class="sub_menu"><a href="#">Empresas</a></li>
                                              <li><a href="#">Vagas Estágios</a></li>
                                          </ul>
                                        </li>
                                        <li><a>Supervisionado<span class="fa fa-chevron-down"></span></a>
                                          <ul class="nav child_menu">
                                              <li class="sub_menu"><a href="#">Documentos Obrigatórios</a></li>                                              
                                          </ul>
                                        </li>
                                    </ul>
                                </li>
                                 @if(Gate::allows('role_admin'))
                                <li><a><i class="fa fa-university"></i> Acadêmico <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                      @can('role_admin')
                                        <li><a>Cursos<span class="fa fa-chevron-down"></span></a>
                                          <ul class="nav child_menu">
                                              <li class="sub_menu"><a href="{{route('admin.tipos.cursos.index')}}">Classificação</a></li>
                                              <li><a href="{{route('admin.cursos.index')}}">Gerenciar Cursos</a></li>
                                          </ul>
                                        </li>
                                        <li><a>Disciplinas<span class="fa fa-chevron-down"></span></a>
                                          <ul class="nav child_menu">
                                              <li class="sub_menu"><a href="#">Grade</a></li>
                                              <li><a href="#">Cadastro Disciplinas</a></li>
                                          </ul>
                                        </li>
                                        <li><a>Docentes<span class="fa fa-chevron-down"></span></a>
                                          <ul class="nav child_menu">
                                              <li class="sub_menu"><a href="level2.html">Dados do docente</a></li>
                                              <li><a href="#level2_1">Disciplinas vinculadas</a></li>
                                          </ul>
                                        </li>
                                        @endcan
                                    </ul>
                                </li>
                                @endif
                                <li><a><i class="fa fa-archive"></i> Material de Aula <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="#">Gerenciar arquivos</a></li>
                                    </ul>
                                </li>						
                                <li><a><i class="fa fa-download"></i> Downloads <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="#">Categorias</a></li>
                                        <li><a href="#">Gerenciar arquivos</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-desktop"></i> Páginas Site <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">                        
                                        <li><a href="#level1_2">Listar</a></li>						
                                        <li><a>Genrenciar<span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">                            
                                                <li><a href="#level2_1">Nova Página</a></li>
                                                <li><a href="#level2_1">Vincular Download</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-paper-plane-o"></i> Notícias Site <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">                        
                                        <li><a href="#level1_2">Listar</a></li>						
                                        <li><a>Gerenciar<span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">                            
                                                <li><a href="#level2_1">Nova Notícia</a></li>
                                                <li><a href="#level2_1">Vincular Download</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        

                        <div class="menu_section">
                          <h3>Painel Aluno</h3>
                          <ul class="nav side-menu">
                            <li><a><i class="fa fa-archive"></i> Material de Aula <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                <li><a href="#">Arquivos</a></li>					  
                              </ul>
                            </li>                  
                          <li><a><i class="fa fa-link"></i> Links úteis <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                <li><a href="#">SIGA</a></li>					  
                              </ul>
                            </li>
                          </ul>
                        </div>

                        <div class="menu_section">
                            <h3>Painel Docente</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-archive"></i> Material de Aula <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="#">Gerenciar arquivos</a></li>                      
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-edit"></i> Meus Dados <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="#">Informações do docente</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
              <div class="nav_menu">
                <nav class="" role="navigation">
                  <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                  </div>

                  <ul class="nav navbar-nav navbar-right">
                    <li class="">
                      <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="/assets/template-restrict/images/img.jpg" alt="">{{ Auth::user()->name }}
                        <span class=" fa fa-angle-down"></span>
                      </a>
                      <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="javascript:;"> Perfil</a></li>                        
                        <li>
                          <a href="javascript:;">
                            <span class="badge bg-red pull-right">50%</span>
                            <span>Settings</span>
                          </a>
                        </li>
                        <li><a href="javascript:;">Ajuda</a></li>
                        <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out pull-right"></i> Sair</a></li>
                      </ul>
                    </li>

                    <li role="presentation" class="dropdown">
                      <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">6</span>
                      </a>
                      <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <li>
                          <a>
                            <span class="image"><img src="/assets/template-restrict/images/img.jpg" alt="Profile Image" /></span>
                            <span>
                              <span>John Smith</span>
                              <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                              Film festivals used to be do-or-die moments for movie makers. They were where...
                            </span>
                          </a>
                        </li>
                        <li>
                          <a>
                            <span class="image"><img src="/assets/template-restrict/images/img.jpg" alt="Profile Image" /></span>
                            <span>
                              <span>John Smith</span>
                              <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                              Film festivals used to be do-or-die moments for movie makers. They were where...
                            </span>
                          </a>
                        </li>
                        <li>
                          <a>
                            <span class="image"><img src="/assets/template-restrict/images/img.jpg" alt="Profile Image" /></span>
                            <span>
                              <span>John Smith</span>
                              <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                              Film festivals used to be do-or-die moments for movie makers. They were where...
                            </span>
                          </a>
                        </li>
                        <li>
                          <a>
                            <span class="image"><img src="/assets/template-restrict/images/img.jpg" alt="Profile Image" /></span>
                            <span>
                              <span>John Smith</span>
                              <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                              Film festivals used to be do-or-die moments for movie makers. They were where...
                            </span>
                          </a>
                        </li>
                        <li>
                          <div class="text-center">
                            <a>
                              <strong>See All Alerts</strong>
                              <i class="fa fa-angle-right"></i>
                            </a>
                          </div>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
            <!-- /top navigation -->
            
            <!-- page content -->
            <div class="right_col" role="main">
                  <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>@yield('page-title')</h3>
                            </div> 

                            @section('top-search')
                            @show
                            
                        </div>

                        <div class="clearfix"></div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>@yield('x-title')</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                              <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                              </ul>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="container">
                                            @yield('conteudo')
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- /page content -->
            
        

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    @section('scripts')
    <!-- jQuery -->
    <script src="/assets/template-restrict/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/assets/template-restrict/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/assets/template-restrict/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/assets/template-restrict/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="/assets/template-restrict/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="/assets/template-restrict/vendors/bernii/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="/assets/template-restrict/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="/assets/template-restrict/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="/assets/template-restrict/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="/assets/template-restrict/vendors/Flot/jquery.flot.js"></script>
    <script src="/assets/template-restrict/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="/assets/template-restrict/vendors/Flot/jquery.flot.time.js"></script>
    <script src="/assets/template-restrict/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="/assets/template-restrict/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="/assets/template-restrict/js/flot/jquery.flot.orderBars.js"></script>
    <script src="/assets/template-restrict/js/flot/date.js"></script>
    <script src="/assets/template-restrict/js/flot/jquery.flot.spline.js"></script>
    <script src="/assets/template-restrict/js/flot/curvedLines.js"></script>
    <!-- jVectorMap -->
    <script src="/assets/template-restrict/js/maps/jquery-jvectormap-2.0.3.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="/assets/template-restrict/js/moment/moment.min.js"></script>
    <script src="/assets/template-restrict/js/datepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="/assets/template-restrict/build/js/custom.min.js"></script>

    <!-- Flot -->
    <script>
      $(document).ready(function() {
        var data1 = [
          [gd(2012, 1, 1), 17],
          [gd(2012, 1, 2), 74],
          [gd(2012, 1, 3), 6],
          [gd(2012, 1, 4), 39],
          [gd(2012, 1, 5), 20],
          [gd(2012, 1, 6), 85],
          [gd(2012, 1, 7), 7]
        ];
        
        var data2 = [
          [gd(2012, 1, 1), 82],
          [gd(2012, 1, 2), 23],
          [gd(2012, 1, 3), 66],
          [gd(2012, 1, 4), 9],
          [gd(2012, 1, 5), 119],
          [gd(2012, 1, 6), 6],
          [gd(2012, 1, 7), 9]
        ];
        $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
          data1, data2
        ], {
          series: {
            lines: {
              show: false,
              fill: true
            },
            splines: {
              show: true,
              tension: 0.4,
              lineWidth: 1,
              fill: 0.4
            },
            points: {
              radius: 0,
              show: true
            },
            shadowSize: 2
          },
          grid: {
            verticalLines: true,
            hoverable: true,
            clickable: true,
            tickColor: "#d5d5d5",
            borderWidth: 1,
            color: '#fff'
          },
          colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
          xaxis: {
            tickColor: "rgba(51, 51, 51, 0.06)",
            mode: "time",
            tickSize: [1, "day"],
            //tickLength: 10,
            axisLabel: "Date",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 10
          },
          yaxis: {
            ticks: 8,
            tickColor: "rgba(51, 51, 51, 0.06)",
          },
          tooltip: false
        });

        function gd(year, month, day) {
          return new Date(year, month - 1, day).getTime();
        }
      });
    </script>
    <!-- /Flot -->

    <!-- jVectorMap -->
    <script src="/assets/template-restrict/js/maps/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/assets/template-restrict/js/maps/jquery-jvectormap-us-aea-en.js"></script>
    <script src="/assets/template-restrict/js/maps/gdp-data.js"></script>
    <script>
      $(document).ready(function(){
        $('#world-map-gdp').vectorMap({
          map: 'world_mill_en',
          backgroundColor: 'transparent',
          zoomOnScroll: false,
          series: {
            regions: [{
              values: gdpData,
              scale: ['#E6F2F0', '#149B7E'],
              normalizeFunction: 'polynomial'
            }]
          },
          onRegionTipShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>
    <!-- /jVectorMap -->

    <!-- Skycons -->
    <script>
      $(document).ready(function() {
        var icons = new Skycons({
            "color": "#73879C"
          }),
          list = [
            "clear-day", "clear-night", "partly-cloudy-day",
            "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
            "fog"
          ],
          i;

        for (i = list.length; i--;)
          icons.set(list[i], list[i]);

        icons.play();
      });
    </script>
    <!-- /Skycons -->

    <!-- Doughnut Chart -->
    <script>
      $(document).ready(function(){
        var options = {
          legend: false,
          responsive: false
        };

        new Chart(document.getElementById("canvas1"), {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: {
            labels: [
              "Symbian",
              "Blackberry",
              "Other",
              "Android",
              "IOS"
            ],
            datasets: [{
              data: [15, 20, 30, 10, 30],
              backgroundColor: [
                "#BDC3C7",
                "#9B59B6",
                "#E74C3C",
                "#26B99A",
                "#3498DB"
              ],
              hoverBackgroundColor: [
                "#CFD4D8",
                "#B370CF",
                "#E95E4F",
                "#36CAAB",
                "#49A9EA"
              ]
            }]
          },
          options: options
        });
      });
    </script>
    <!-- /Doughnut Chart -->
    
    <!-- bootstrap-daterangepicker -->
    <script>
      $(document).ready(function() {

        var cb = function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        };

        var optionSet1 = {
          startDate: moment().subtract(29, 'days'),
          endDate: moment(),
          minDate: '01/01/2012',
          maxDate: '12/31/2015',
          dateLimit: {
            days: 60
          },
          showDropdowns: true,
          showWeekNumbers: true,
          timePicker: false,
          timePickerIncrement: 1,
          timePicker12Hour: true,
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          opens: 'left',
          buttonClasses: ['btn btn-default'],
          applyClass: 'btn-small btn-primary',
          cancelClass: 'btn-small',
          format: 'MM/DD/YYYY',
          separator: ' to ',
          locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Clear',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
          }
        };
        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
        $('#reportrange').daterangepicker(optionSet1, cb);
        $('#reportrange').on('show.daterangepicker', function() {
          console.log("show event fired");
        });
        $('#reportrange').on('hide.daterangepicker', function() {
          console.log("hide event fired");
        });
        $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
          console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
        });
        $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
          console.log("cancel event fired");
        });
        $('#options1').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
        });
        $('#options2').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
        });
        $('#destroy').click(function() {
          $('#reportrange').data('daterangepicker').remove();
        });
      });
    </script>
    <!-- /bootstrap-daterangepicker -->

    <!-- gauge.js -->
    <script>
      var opts = {
          lines: 12,
          angle: 0,
          lineWidth: 0.4,
          pointer: {
              length: 0.75,
              strokeWidth: 0.042,
              color: '#1D212A'
          },
          limitMax: 'false',
          colorStart: '#1ABC9C',
          colorStop: '#1ABC9C',
          strokeColor: '#F0F3F3',
          generateGradient: true
      };
      var target = document.getElementById('foo'),
          gauge = new Gauge(target).setOptions(opts);

      gauge.maxValue = 6000;
      gauge.animationSpeed = 32;
      gauge.set(3200);
      gauge.setTextField(document.getElementById("gauge-text"));
    </script>
    <!-- /gauge.js -->
    @show

  </body>
</html>