<!DOCTYPE html>
<html lang="pt-BR">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Fatec Marília</title>
            
      @section('css')
        <link rel="stylesheet" href="/assets/template-public/css/components.css">
        <link rel="stylesheet" href="/assets/template-public/css/responsee.css">
      @show
        
        <!-- TWITTER BOOTSTRAP -->
        <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">

        <!-- CUSTOM STYLE -->
        <link rel="stylesheet" href="/assets/template-public/css/template-style.css">

        <link href='https://fonts.googleapis.com/css?family=Ubuntu:500,400' rel='stylesheet' type='text/css'>
        <!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->      
      
   </head>
   <body class="size-1140">
      <!-- TOP NAV WITH LOGO -->
      <header>                        
        <div class="line">
            <div class="s-12 l-4">
              <img class="s-5 l-12 center" src="/img/template/logofatec.png" alt="">
            </div>
        </div>
        <nav>            
            <div class="line">               
               <div class="top-nav s-12 l-12">
                  <p class="nav-text">Menu Principal</p>
                  <ul class="chevron">
                     <li>
                        <a>Institucional</a>
                        <ul>
                           <li><a>Sobre a Fatec Marília</a></li>
                           <li>
                              <a>Departamentos</a>
                              <ul>
                                 <li><a>Diretoria</a></li>
                                 <li><a>Secretaria Acadêmica</a></li>
                                 <li><a>Serviços Administrativos</a></li>
                                 <li><a>Biblioteca</a></li>
                                 <li><a>Informática</a></li>
                                 <li><a>Laboratórios</a></li>
                              </ul>
                           </li>
                           <li><a>Corpo Docente</a></li>
                           <li><a>CEUA</a></li>
                           <li><a>Concursos</a></li>
                        </ul>
                     </li>
                     <li>
                        <a>Cursos</a>
                        <ul>                           
                           <li>
                              <a>Gradução Superior</a>
                              <ul>
                                 <li><a>Tecnologia em Alimentos</a></li>
                                 <li><a>Tecnologia em Gestão Empresarial</a></li>                                 
                              </ul>
                           </li>
                           <li>
                              <a>Pós-Gradução</a>
                              <ul>
                                 <li><a>Gestão em Controle de Qualidade dos Alimentos</a></li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <li>
                        <a>Estágios</a>
                        <ul>                           
                           <li><a>Supervisionado</a></li>
                           <li><a>Empresa</a></li>
                        </ul>
                     </li>
                     <li>
                        <a>Biblioteca</a>
                        <ul>
                           <li><a>Conheça a Biblioteca</a></li>
                           <li><a>Catálogo</a></li>
                           <li><a>Regulamento</a></li>
                           <li><a>Guia de Normalização de Referências</a></li>
                           <li><a>Guia de Normalização de Trabalhos Acadêmicos</a></li>                           
                        </ul>
                     </li>
                     <li>
                        <a>Docentes</a>
                        <ul>
                           <li><a>Acesso ao SIGA</a></li>                           
                        </ul>
                     </li>
                     <li>
                        <a>Alunos</a>
                        <ul>
                           <li><a>Acesso ao SIGA</a></li>
                           <li><a>Material de Aula</a></li>
                           <li><a>Intercâmbio Cultural</a></li>
                           <li><a>FEETEPS</a></li>
                        </ul>
                     </li>
                     <li>
                        <a>Publicações</a>
                        <ul>
                           <li><a>Revista Alimentus</a></li>                           
                        </ul>
                     </li>                     
                     <li><a>Vestibular</a></li>
                     <li><a data-toggle="tooltip" data-placement="bottom" title="Área restrita"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></a></li>  
                  </ul>
               </div>
            </div>
        </nav>         
      </header>
      
      <!-- CONTEUDO DO SITE -->   
      <section>
        @yield('conteudo')
      </section>   
      <!-- FIM CONTEUDO DO SITE -->   

      <!-- FOOTER -->
      <footer>        
         <div class="line">
            <div class="s-12 l-12">
             <div class="margin-bottom">                               
             <a href="http://www.cps.sp.gov.br" target="_blank">
                <img class="center" src="/img/template/logocps2.png" alt="">
             </a>
             </div>
           </div>
         </div>        
         <div class="line">
            <div class="s-12 l-6">
               <address>
                 <strong>Fatec Marília</strong><br>
                 <strong>Faculdade de Tecnologia "Estudante Rafael Almeida Camarinha"</strong><br>
                 Avenida Castro Alves, 62 - 2º andar<br>
                 Bairro Somenzari<br>
                 CEP 17506-000<br>
                 Marília - SP<br>
                 <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> (14) 3454-7540<br>
                 <i class="icon-at"></i> fatecmarilia@gmail.com
               </address>               
            </div>
            <div class="s-12 l-6">
               <div class="right margin">
                  <h6>Copyright 2006 - 2016</h6>
                  <h6>Todos os direitos reservados.</h6>
                  <h6><i class="icon-link"></i><a href="http://www.myresponsee.com" target="_blank" title="Responsee - lightweight responsive framework"> Responsee Team</a></h6>                  
                  <h6>Redes Sociais</h6>
                  <div class="redes-sociais">
                    <ul>
                      <li><a href="https://www.facebook.com/fatec.marilia" target="_blank" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="facebook sprite sprite-facebook_bw"></i></a></li>
                      <li><a href="https://www.youtube.com/user/fatecmarilia" target="_blank" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="youtube sprite sprite-youtube_bw"></i></a></li>                      
                    </ul>
                   </div>
               </div>               
            </div>
         </div>      
      </footer>
      
    
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script/bootstrap>

      <!-- TWITTER BOOTSTRAP -->
      <script type="text/javascript" src="/assets/bootstrap/js/bootstrap.min.js"></script>

      <!--<script type="text/javascript" src=/bootstrap"js/jquery-1.8.3.min.js"></script>-->
      <script type="text/javascript" src="/assets/template-public/assets/template-public/assets/template-public/js/jquery-ui.min.js"></script>
      <script type="text/javascript" src="/assets/template-public/assets/template-public/js/modernizr.js"></script>
      <script type="text/javascript" src="/assets/template-public/js/responsee.js"></script>
      
      @section('scripts')
        <script type="text/javascript">
         jQuery(document).ready(function($) { 

            $('[data-toggle="tooltip"]').tooltip();

            $('i.facebook').hover(function(){
              $(this).removeClass('sprite-facebook_bw');
              $(this).addClass('sprite-facebook');
              }, function(){
                $(this).removeClass('sprite-facebook');
                $(this).addClass('sprite-facebook_bw');
              }
            );
            $('i.youtube').hover(function(){
              $(this).removeClass('sprite-youtube_bw');
              $(this).addClass('sprite-youtube');
              }, function(){
                $(this).removeClass('sprite-youtube');
                $(this).addClass('sprite-youtube_bw');
              }
            );           
         });    
      </script>
    @show      
   </body>
</html>