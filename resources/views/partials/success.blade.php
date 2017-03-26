@if(Session::has('alert'))
	<div class="alert alert-success">
		{{ Session::get('alert') }}
	</div>
@endif