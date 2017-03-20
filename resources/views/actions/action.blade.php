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
		    	<li class="active"><a href="#">Descripción</a></li>
		    	<li><a href="#">Preguntas Frecuentes</a></li>
		  	</ul>
		  	<div class="panel panel-default">
		  		<div class="panel-body"> 
		  			{{ $action->description }}
		  		</div>
		  	</div>
		  	<a href="{{ route('create-proposal-form', ['action_id' => $action->id]) }}" class="btn btn-primary">Crear propuesta</a>
		</div>
	</div>
</div>



@endsection