@extends('layout')


@section('content')

<div class="jumbotron"></div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		  	<h2>
				<a href="{{ route('action', ['id' => $action->id]) }}"><small>{{$action->title}}</small> </a> <small> >> Propuesta</small>
				<br>
				{{ $proposal->title }}
			</h2>
			<p class="proposal-text">{!! nl2br($proposal->content) !!}</p>
			<hr>
			<div class="row">
				<div class="col-md-6">
					@if(in_array(Auth::check() and Auth::user()->id, $supporters))
						<form role="form" method="POST" action="{{ route('proposal.unsupport')}}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
							<input type="hidden" name="_method" value="DELETE">
							
							<button type="submit" class="btn btn-modern btn-lg">
							  <small>Quitar apoyo</small>
							</button>
							&nbsp;
							<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
							<span class="proposal-text"> {{count($supporters)}}</span>
						</form>
					@elseif(Auth::check())
						<form role="form" method="POST" action="{{ route('proposal.support')}}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="proposal_id" value="{{ $proposal->id }}">
							
							<button type="submit" class="btn btn-modern btn-lg">
							  <small>Apoyar</small>
							</button>
							&nbsp;
							<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
							<span class="proposal-text"> {{count($supporters)}}</span>
						</form>
					@else
					  	<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>	
						<span class="proposal-text">{{count($supporters)}}</span>
					@endif
				</div>
				<div class="col-md-6">
					<span class="text-muted pull-right">
						Creado por <a href="">{{$creator->name}}</a>. 
						<br>
						Última edición: {{$proposal->updated_at}}
					</span>
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
			  	<h3>Discusión</h3>
			  	@include('partials/comments_list')

			  	@if(Auth::check())
				  	<ul class="nav nav-tabs">
				    	<li class="active"><a href="#"> Comentar </a></li>
				  	</ul>
					<form class="form-horizontal" role="form" method="POST" action="{{ route('proposal.comment')}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="proposal_id" value="{{ $proposal->id }}">

						<div class="form-group">
							<div class="col-md-12">
								<textarea class="form-control" rows="5" name="comment" required>{{old('comment')}}</textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col" align="right">
								<button type="submit" class="btn btn-default" style="margin-right: 15px;">
								Publicar comentario
								</button>
							</div>
						</div>
					</form>
				@else
					<p class="text-muted" align="center">Inicia sesión para comentar</p>
				@endif
			</div>
		</div>
	</div>
</div>	
@endsection