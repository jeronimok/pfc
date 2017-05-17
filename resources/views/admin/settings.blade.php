@extends('layout')

@section('content')

<div class="jumbotron">
	<div class="row">
		<div class="col-md-8 col-md-offset-2"> 
			<h2>
				<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
				Administración de la plataforma
			</h2>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-md-offset-2">
			@include('partials/success')
			@include('partials/errors')
			<h4>
				<span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>
				Acciones participativas
			</h4>
			<a href="{{ route('settings/create-action') }}" class="list-group-item">@lang('admin.create_action') <span class="pull-right glyphicon glyphicon-plus" aria-hidden="true"></span> </a>
			<br>
			<h4>
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				Usuarios
			</h4>
			<a href="" class="list-group-item">Crear usuarios<span class="pull-right glyphicon glyphicon-plus" aria-hidden="true"></span> </a>
		</div>
		<div class="col-md-4">
			<h4>
				<span class="glyphicon glyphicon-stats" aria-hidden="true"></span>
				Estadísticas
			</h4>
			<img class="img-responsive" src="/images/700x400.png" alt="...">
		</div>
	</div>
</div>

				

@endsection