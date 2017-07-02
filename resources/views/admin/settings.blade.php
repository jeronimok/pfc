@extends('layout')

@section('content')

<div class="jumbotron">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2"> 
				<h2>
					<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
					Administración de la plataforma
				</h2>
				@include('partials/success')
				@include('partials/errors')
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-md-offset-2">
			<h4>
				<span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>
				Acciones participativas
			</h4>
			<a href="{{ route('action.create') }}" class="list-group-item">@lang('admin.create_action') <span class="pull-right glyphicon glyphicon-plus" aria-hidden="true"></span> </a>
			<hr>
			<h4>
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				Usuarios
			</h4>
			<a href="{{route('user.create')}}" class="list-group-item">Crear usuario<span class="pull-right glyphicon glyphicon-plus" aria-hidden="true"></span> </a>
			<br>
			@if(count($banned_users)>0)
				<div class="alert alert-info">
					<label>Usuarios suspendidos</label>
					<br>
					@foreach($banned_users as $user)
						<a href="{{route('user', $user->id)}}">{{$user->name}}</a>, 
					@endforeach
				</div>
			@endif
		</div>
		<div class="col-md-4">
			<h4>
				<span class="glyphicon glyphicon-stats" aria-hidden="true"></span>
				Estadísticas
			</h4>
			Resumen:
			<ul>
				<li>Usuarios registrados: <strong>{{$data['users']}}</strong></li>
				<li>Usuarios registrados con redes sociales: <strong>{{$data['social_users']}}</strong></li>
				<li>Usuarios suspendidos: <strong>{{$data['banned_users']}}</strong></li>
				<li>Acciones participativas: <strong>{{$data['actions']}}</strong></li>
				<li>Propuestas creadas: <strong>{{$data['proposals']}}</strong></li>
				<li>Obras publicadas: <strong>{{$data['works']}}</strong></li>
				<li>Comentarios realizados: <strong>{{$data['comments']}}</strong></li>
			</ul>
			
			<a href="" >Ver estadísticas detalladas <span> <i class="fa fa-area-chart" aria-hidden="true"></i> <i class="fa fa-bar-chart" aria-hidden="true"></i> <i class="fa fa-line-chart" aria-hidden="true"></i></span> </a>
			
		</div>
	</div>
</div>

				

@endsection