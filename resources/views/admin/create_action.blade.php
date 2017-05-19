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
				<h2>Nueva acción participativa</h2>
			</div>
		</div>
	</div>
</div>

<div class="container fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">	
			@include('partials/errors')

			<form role="form" method="POST" action="{{ route('settings/create-action') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="form-group">
					<label class="control-label">Título</label>
					<input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
				</div>
				<br>
				<div class="form-group">
					<label class="control-label">Descripción</label>
					<textarea id="summernote" class="form-control" rows="3" name="description" required>{{old('description')}}</textarea>
				</div>
				<div class="form-group">
					<label class="control-label">¿Cómo participo?</label>
					<textarea class="form-control" rows="3" name="howto" placeholder="Describe cómo debe interactuar el ciudadano con esta acción participativa..." required>{{old('howto')}}</textarea>
				</div>
				<br>
				<div class="form-group">
					<label class="control-label">Administrador (email)</label>
					<input id="admin_email" type="email" name="admin_email" value="{{ old('admin_email') }}" class="form-control" placeholder="Empieza a escribir para filtrar resultados..." required>
				</div>
				<br>
				<div class="form-group">
					<label class="control-label">Funcionalidades</label>
				    <div class="checkbox">
					  <label><input type="checkbox" name="create_p" checked>Crear propuestas</label>
					</div>
					<div class="checkbox">
					  <label><input type="checkbox" name="debate_p" >Debatir propuestas</label>
					</div>
					<div class="checkbox">
					  <label><input type="checkbox" name="support_p" >Apoyar propuestas</label>
					</div>
					<div class="checkbox">
					  <label><input type="checkbox" name="opt_p" >Optar entre alternativas</label>
					</div>
					<div class="checkbox">
					  <label><input type="checkbox" name="audit" >Auditar obras</label>
					</div>
				</div>	
				<br>
				<div class="form-group" align="center">
					<button type="submit" class="btn btn-default btn-lg" style="margin-right: 15px;">
						Crear acción participativa
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