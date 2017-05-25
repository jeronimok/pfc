@extends('layout')

@section('styles')
<!-- easy-autocomplete -->
<link rel="stylesheet" type="text/css" href="/bower_components/EasyAutocomplete/dist/easy-autocomplete.min.css">
@endsection

@section('content')

<div class="jumbotron">
	<div class="container fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2>Editar <small><a href="{{route('action', $action->id)}}">({{$action->title}})</a></small></h2>
			</div>
		</div>
	</div>
</div>

<div class="container fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">	
			@include('partials/errors')

			<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('action.update', $action->id) }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="_method" value="PUT">

				<div class="form-group">
					<label class="control-label">Título</label>
					<input type="text" name="title" class="form-control" value="{{ $action->title }}" required>
				</div>
				<br>
				<div class="form-group">
					<label class="control-label">Descripción</label>
					<textarea id="summernote" class="form-control" rows="3" name="description" required>{{$action->description}}</textarea>
				</div>
				<div class="form-group">
					<label class="control-label">¿Cómo participo?</label>
					<textarea class="form-control" rows="3" name="howto" placeholder="Describe cómo debe interactuar el ciudadano con esta acción participativa..." required>{{$action->howto}}</textarea>
				</div>
				<br>
				<div class="form-group">
					<label class="control-label">Administrador (email)</label>
					<input id="admin_email" type="email" name="admin_email" value="{{ $action->admin_email }}" class="form-control" placeholder="Empieza a escribir para filtrar resultados..." required>
				</div>
				<br>
				<div class="form-group">
					<label class="control-label">Funcionalidades</label>
				    <div class="checkbox">
					  <label><input type="checkbox" name="create_p" @if( $action->create_p )checked @endif>Crear propuestas</label>
					</div>
					<div class="checkbox">
					  <label><input type="checkbox" name="debate_p" @if( $action->debate_p )checked @endif >Debatir propuestas</label>
					</div>
					<div class="checkbox">
					  <label><input type="checkbox" name="support_p" @if( $action->support_p )checked @endif >Apoyar propuestas</label>
					</div>
					<div class="checkbox">
					  <label><input type="checkbox" name="opt_p" @if( $action->opt_p )checked @endif >Optar entre alternativas</label>
					</div>
					<div class="checkbox">
					  <label><input type="checkbox" name="audit" @if( $action->audit )checked @endif >Auditar obras</label>
					</div>
				</div>
				<div class="form-group">
			    	<label for="avatar">Logo</label>
			    	<div class="alert alert-info">
			    		<div class="row">
				    		<div class="col-md-9 bottom-column">	
			    				<strong>Subir un archivo</strong>
			    				<br>
			    				<p>(La imagen debe ser cuadrada para su correcta visualización)</p>
			    				<input type="file" name="avatar">
				    		</div>

				    		<div class="col-md-3">
				    			<img class="img-fluid img-rounded img-small" src="{{$action->avatar}}" alt="Logo">		
				    		</div>
				    	</div>
			    	</div>
			  	</div>
				<br>
				<div class="form-group" align="center">
					<button type="submit" class="btn btn-default btn-lg" style="margin-right: 15px;">
						Guardar
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection

@section('scripts')
<script src="/bower_components/EasyAutocomplete/dist/jquery.easy-autocomplete.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {

	var options = {

	  	url: "/info-usuarios",

	    getValue: "email",

	    template: {
	        type: "description",
	        fields: {
	            description: "name"
	        }
	    },

	    list: {
	        match: {
	            enabled: true
	        }
	    },
	};

	$("#admin_email").easyAutocomplete(options);
});
</script>
@endsection