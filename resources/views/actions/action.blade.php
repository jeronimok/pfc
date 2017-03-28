@extends('layout')

@section('content')
<div class="jumbotron">

</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>
				{{ $action->title }}
				<br>
				<small>Descripción</small>
			</h2>
	  		<p class="action-text">{!! nl2br($action->description) !!}</p>
	  		@include('partials/success')
	  		<hr>
		</div>
	</div>
</div>

<div class="jumbotron">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h3>
					Propuestas
				</h3>
				@include('partials/proposals_list')
			</div>
		</div>
	</div>
</div>

@endsection