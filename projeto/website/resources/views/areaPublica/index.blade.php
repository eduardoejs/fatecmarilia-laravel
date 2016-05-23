@extends('layouts.areaPublica')

@section('css')
	@parent
	<link rel="stylesheet" href="/assets/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="/assets/owl-carousel/owl.theme.css">
@stop

@section('conteudo')
	@include('areaPublica.resources.carrousel')
	@include('areaPublica.resources.links')
	@include('areaPublica.resources.news')
	@include('areaPublica.resources.fastNotes')
	@include('areaPublica.resources.scheduling')
	@include('areaPublica.resources.partners')	
 @endsection

 @section('scripts')
 	@parent
 	<script type="text/javascript" src="/assets/owl-carousel/owl.carousel.min.js"></script>

 	<script type="text/javascript">
        jQuery(document).ready(function($) { 
        	
        	$("#owl-demo").owlCarousel({
            items : 1,
            lazyLoad : true,
            autoPlay : true,
            navigation : true,            
            pagination : true
            /*navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            autoPlay : true,
            singleItem:true*/
           });
           
           $("#owl-demo2").owlCarousel({
            slideSpeed : 300,
            autoPlay : true,
            navigation : true,
            pagination : true,
            singleItem:true
           });
           
           $("#owl-demo3").owlCarousel({
            items : 4,
            lazyLoad : true,
            autoPlay : true,
            navigation : true,            
            pagination : false,
            loop: true,
            margin: 10
           });
        });
 	</script>
 @stop