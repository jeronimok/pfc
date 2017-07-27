@extends('layout')

@section('styles')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
@endsection

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
		<div class="col-md-8 col-md-offset-2"> 
			<div class="row">
				<div class="col-md-6">
					<h4>
						<span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>
						Acciones participativas
					</h4>
					<a href="{{ route('action.create') }}" class="list-group-item">@lang('admin.create_action') <span class="pull-right glyphicon glyphicon-plus" aria-hidden="true"></span> </a>
					<br>
					<ul>
						<li>Acciones participativas: <strong>{{$data['actions']}}</strong></li>
						<li>Propuestas creadas: <strong>{{$data['proposals']}}</strong></li>
						<li>Obras publicadas: <strong>{{$data['works']}}</strong></li>
						<li>Comentarios realizados: <strong>{{$data['comments']}}</strong></li>
					</ul>
				</div>
				<div class="col-md-6">
					<h4>
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
						Usuarios
					</h4>
					<a href="{{route('user.create')}}" class="list-group-item">Crear usuario<span class="pull-right glyphicon glyphicon-plus" aria-hidden="true"></span> </a>
					<br>
					<ul>
						<li>Usuarios registrados: <strong>{{$data['users']}}</strong></li>
						<li>Usuarios registrados con redes sociales: <strong>{{$data['social_users']}}</strong></li>
						<li>Usuarios suspendidos: <strong>{{$data['banned_users']}}</strong></li>
					</ul>
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
			</div>
			<hr>
			<h4>
				<span class="glyphicon glyphicon-stats" aria-hidden="true"></span>
				Estadísticas
			</h4>
			<br>
			<div class="row">
				<div class="col-md-6">
					Propuestas, comentarios y calificaciones publicadas por mes:
					<div id="myfirstchart" style="height: 250px;"></div>
				</div>
				<div class="col-md-6">
					Usuarios por distrito:
					<div id="mysecondchart" style="height: 200px;"></div>
					<a href="/stats" class="list-group-item">Ver estadísticas de sesiones de usuario <span class="pull-right"> <i class="fa fa-area-chart" aria-hidden="true"></i> <i class="fa fa-bar-chart" aria-hidden="true"></i> <i class="fa fa-line-chart" aria-hidden="true"></i></span> </a>
				</div>
			</div>
			<hr>
		</div>
	</div>
</div>

@endsection

@section('scripts')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

<script type="text/javascript">
new Morris.Area({
  element: 'myfirstchart',
  data: [
    { y: '2017-01', propuestas: 5, comentarios:10, obras: 20, calificaciones: 20 },
    { y: '2017-02', propuestas: 12, comentarios:20,  obras: 8, calificaciones: 30 },
    { y: '2017-03', propuestas: 20, comentarios:27,  obras: 3, calificaciones: 40 },
    { y: '2017-04', propuestas: 15, comentarios:30,  obras: 2, calificaciones: 50 },
    { y: '2017-05', propuestas: 10, comentarios:37,  obras: 2, calificaciones: 60 }
  ],
  xkey: 'y',
  ykeys: ['propuestas', 'comentarios', 'calificaciones'],
  labels: ['Propuestas', 'Comentarios', 'Calificaciones'],
  
});

Morris.Donut({
  element: 'mysecondchart',
  data: [
    {label: "Centro", value: 29},
    {label: "Este", value: 22},
    {label: "La costa", value: 18},
    {label: "Norte", value: 10},
    {label: "Noreste", value: 9},
    {label: "Noroeste", value: 5},
    {label: "Oeste", value: 2},
    {label: "Suroeste", value: 5}
  ],
  formatter: function (y, data) { return y + '%' }
});



</script>
@endsection