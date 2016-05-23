@extends('layouts.areaPublica')

@section('css')
	@parent
	<link rel="stylesheet" href="/assets/lightbox/css/lightbox.css">
@stop

@section('conteudo')
<div id="bloco-materia">
    <div class="line">
       <div class="s-12 m-12 l-12">
          <h2>Menção Honrosa no Prêmio Josué de Castro</h2>
          <small>Publicado em: 16/05/2016.</small>
          <div class="corpo-materia">                     
             <a href="/img/template/noticias/noticia1.jpg" data-lightbox="image-1" data-title="Imagem principal"><img src="/img/template/noticias/noticia1-thumb.jpg" alt="..." class="img-thumbnail"></a>
             
             
                 
                 <p>A Fatec Marília recebeu em outubro de 2015 a Menção Honrosa no Prêmio Josué de Castro com o trabalho "Qualidade microbiológica e temperatura de conservação de maioneses caseiras comercializadas em trailers de lanches no município de Marília- SP"</p>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor, dui nec dictum tempor, enim massa gravida lectus, nec sollicitudin sapien metus non nisi. Mauris sit amet tempor arcu. Maecenas varius, lectus in fringilla iaculis, mi libero dignissim nisl, bibendum imperdiet mauris tellus eu massa. Phasellus a consectetur orci. Maecenas bibendum interdum tincidunt. Nulla sodales massa dolor, ut mollis justo aliquam nec. Nullam elementum posuere justo, non viverra ex ornare id.</p>
                 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor, dui nec dictum tempor, enim massa gravida lectus, nec sollicitudin sapien metus non nisi. Mauris sit amet tempor arcu. Maecenas varius, lectus in fringilla iaculis, mi libero dignissim nisl, bibendum imperdiet mauris tellus eu massa. Phasellus a consectetur orci. Maecenas bibendum interdum tincidunt. Nulla sodales massa dolor, ut mollis justo aliquam nec. Nullam elementum posuere justo, non viverra ex ornare id.</p>
                 <p>Autores:
                 <p>Leandro Repetti</p>
                 <p>Marie Oshiiwa</p>
                 <p>Alexandre Pereira Barbosa</p>
                 <p>Jonatas Batista Nunis</p>
                 <p>Bruce Yoshida Labate</p>
                 <p>Murilo Maciel Temoteo</p>

          </div>
                   
          <div class="panel panel-default">
             <div class="panel-heading">
                <h3 class="panel-title">Arquivos para download</h3>
             </div>
             <div class="panel-body">                     
                <div class="s-12 l-12">                           
                   <ul class="list-group">
                     <li class="list-group-item"><a href="#" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Download</a> Dapibus ac facilisis in</li>
                     <li class="list-group-item"><a href="#" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Download</a> Dapibus ac facilisis in</li>
                     <li class="list-group-item"><a href="#" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Download</a> Morbi leo risus</li>
                     <li class="list-group-item"><a href="#" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Download</a> Porta ac consectetur ac</li>
                     <li class="list-group-item"><a href="#" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> Download</a> Vestibulum at eros</li>
                   </ul>                           
                </div>                           
             </div>   
          </div> 
          
          <div class="panel panel-default">
             <div class="panel-heading">
                <h3 class="panel-title">Álbum de fotos</h3>
             </div>
             <div class="panel-body">                     
                <div class="s-12 l-12">                           
                   <a href="/img/template/noticias/news1.jpg" data-lightbox="roadtrip">
                      <img src="/img/template/noticias/news1.jpg" alt="..." class="img-rounded"></a>
                   <a href="/img/template/noticias/news1-2.jpg" data-lightbox="roadtrip">
                      <img src="/img/template/noticias/news1-2.jpg" alt="..." class="img-rounded"></a>                        
                </div>                           
             </div>   
          </div>   
          

       </div>               
    </div>
 </div>
@endsection

@section('scripts')
 	@parent
	<script src="/assets/lightbox/js/lightbox.js"></script>      
      <script>
          lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'albumLabel': "Foto %1 de %2"
          })
    </script>
@endsection