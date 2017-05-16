@if(Session::has('alert'))
	<div class="alert alert-success">
		{{ Session::get('alert') }}
	</div>
@endif

@if(Session::has('status'))
	<div class="alert alert-info">
		{{ Session::get('status') }}
	</div>
@endif