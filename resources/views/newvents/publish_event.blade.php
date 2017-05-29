@extends('layout')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
@endsection

@section('content')
<div class="jumbotron">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 col-md-offset-2">
				<h2>Publicar evento <small><a href="{{route('action', $action->id)}}">{{ $action->title }}</a></small></h2>	
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-2" id="form-container">
			@include('partials/errors')
			<form role="form" method="POST" action="{{route('newvent.store')}}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="action_id" value="{{ $action->id }}">
				<input type="hidden" name="type" value="new">
				<div class="form-group">
					<label class="control-label">Título</label>
					<input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
				</div>
				<div class="form-group">
					<label class="control-label">Fecha</label>
					<input class="form-control" id="date" name="date" placeholder="dd/mm/aaaa" type="text" value="{{ old('date') }}" required>
				</div>
				<div class="form-group">
					<label class="control-label">Link</label>
					<input type="text" name="link" class="form-control" value="{{ old('link') }}" required>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
						Publicar
					</button>
				</div>
			</form>
		</div>
	</div>
</div>


@endsection

@section('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function(){
      var date_input=$('input[name="date"]'); //our date input has the name "date"
      var options={
        format: 'dd-mm-yyyy',
        container: $('#form-container'),
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>
@endsection