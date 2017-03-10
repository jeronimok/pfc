@extends('layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h2>{{ $action->title }}</h2>
			{{ $action->description }}
		</div>
	</div>
</div>

@endsection