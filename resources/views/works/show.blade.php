@extends('layout')


@section('content')

<div class="jumbotron"></div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		  	<h2>
				<a href="{{ route('action', ['id' => $work->action->id]) }}"><small>{{$work->action->title}}</small> </a> <small> >> Obra del municipio</small>
				<br>
				{{ $work->title }}
			</h2>
			<p class="proposal-text">{!! nl2br($work->content) !!}</p>
			<hr>
			<div class="row">
				<div class="col-md-4" align="center">
					<!-- Calificaciones -->
					<h2>
						{{round(array_sum($work->ratings->lists('stars')->toArray())/count($work->ratings->lists('stars')->toArray()),2)}}/5
					</h2>
				</div>
				<div class="col-md-4" align="center">
					<h2>
						@for($i=0; $i < round(array_sum($work->ratings->lists('stars')->toArray())/count($work->ratings->lists('stars')->toArray())); $i++)
							<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						@endfor

						@for($i= round(array_sum($work->ratings->lists('stars')->toArray())/count($work->ratings->lists('stars')->toArray())); $i< 5; $i++)
							<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
						@endfor
					</h2>
				</div>
				<div class="col-md-4" align="center">
					<h2 class="text-muted light">
						<small>
						{{count($work->ratings->lists('stars')->toArray())}} calificaciones
						</small>
					</h2>
				</div>
			</div>
			@include('partials/warning')
		</div>
	</div>
</div>
<br>


<div class="jumbotron">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				@include('partials/errors')
			  	@include('partials/success')
			  	@if(!Auth::check())
			  		<p class="text-muted" align="center">Inicia sesión para calificar</p>
			  	@elseif(Gate::allows('rate', $work->id))
				  	<div class="panel">
				  		<div class="panel-heading">
				  			Calificar
				  		</div>
						<form class="form-horizontal" role="form" method="POST" action="/calificar">
							<div class="panel-body">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" name="work_id" value="{{ $work->id }}">
								<input type="hidden" name="n_stars" id="n_stars" value="0">

								<div class="form-group">
									<label class="col-md-2 control-label">Estrellas</label>
							        <div class="col-md-10 lead">
								        <span id="stars" class="starrr"></span>
								        (<span id="count">0</span>)
							        </div>
								</div>

								<div class="form-group">
									<label class="col-md-2 control-label">Comentario</label>
									<div class="col-md-10">
										<textarea class="form-control" rows="5" name="comment" required>{{old('comment')}}</textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="col" align="center">
										<button type="submit" class="btn btn-modern btn-lg" style="margin-right: 15px;">
										Enviar
										</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				@else
					<p class="text-muted" align="center">Ya calificaste esta obra</p>
				@endif
				@if($work->ratings)
					<h3>Calificaciones</h3>
					@include('partials/ratings_list')
				@endif
			</div>
		</div>
	</div>
</div>	
@endsection


@section('scripts')
<script src="/js/stars.js"></script>
@endsection