@extends('layout')

@section('content')
<div class="jumbotron no-bottom">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1 class="light">
					{{ $action->title }}
					<div class="dropdown pull-right">
					  <button class="btn btn-modern dropdown-toggle btn-lg" type="button" data-toggle="dropdown">Administrar
					  <span class="caret"></span></button>
					  <ul class="dropdown-menu">
					    <li><a href="{{route('action.create-poll', $action->id)}}">Crear Votación entre propuestas</a></li>
					    <li><a href="{{route('work.publish', $action->id)}}">Publicar obra del municipio</a></li>
					  </ul>

					</div>
				</h1>
				@include('partials/warning')
				<ul class="nav nav-tabs">
	  				<li class="active"><a href="#">Descripción</a></li>
	  				@if(count($proposals)>0)
	  					<li><a href="#" class="scroll-link" data-id="propuestas">Propuestas</a></li>
	  				@endif
	  				@if(count($action->poll) > 0 )
	  					<li><a href="#" class="scroll-link" data-id="votacion">Votación</a></li>
	  				@endif
	  				@if(count($action->works()) > 0 )
	  					<li><a href="#" class="scroll-link" data-id="obras">Obras</a></li>
	  				@endif
	  			</ul>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@include('partials/success')
	  		<p class="action-text">{!! nl2br($action->description) !!}</p>
	  		<hr>
		</div>
	</div>
</div>


<div class="jumbotron no-margin-bottom page-section" id="propuestas">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h2 class="light">
					Propuestas <a href="#" class="scroll-top back-to-top btn btn-modern pull-right"><span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span></a>
				</h2>
				<br />
				@include('partials/proposals_list')
			</div>
		</div>
	</div>
</div>


@if(count($action->poll) > 0 )
	<div class="jumbotron jumbo-img no-margin-bottom page-section" id="votacion">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<h1 class="light" align="center" style="color: #f5f5f5;">
						<span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
						VOTACIÓN
						<a href="#" class="scroll-top back-to-top btn btn-modern modern-light pull-right"><span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span></a>
					</h1>
					<br />
					@include('partials/poll')
				</div>
			</div>
		</div>
	</div>
@endif

@if(count($action->works()) > 0 )
	<div class="jumbotron no-margin-bottom page-section" id="obras">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<h2 class="light">
						Obras del municipio <a href="#" class="scroll-top back-to-top btn btn-modern pull-right"><span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span></a>
					</h2>
					<br />
					@include('partials/works_list')
				</div>
			</div>
		</div>
	</div>
@endif

@endsection

@section('scripts')
<script src="/js/scroll.js"></script>
<script src="/js/button_block.js"></script>
@endsection