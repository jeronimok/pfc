@extends('layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@include('partials/success')
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h2>{{ $action->title }}</h2>
		  	<ul class="nav nav-tabs">
		    	<li class="active"><a href="#"> <h4>Descripción</h4> </a></li>
		    	<li><a href="#"> <h4>Preguntas Frecuentes</h4> </a></li>
		  	</ul>
		  	<div class="panel panel-default">
		  		<div class="panel-body"> 
		  			{{ $action->description }}
		  		</div>
		  	</div>
		  	<h3>
		  		Propuestas
		  	</h3>
		  	@include('partials/proposals_list')
		</div>
	</div>

</div>

@endsection