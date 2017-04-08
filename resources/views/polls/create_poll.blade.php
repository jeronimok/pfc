@extends('layout')

@section('content')
<div class="jumbotron">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2 class="light">{{ $action->title }}</h2>
				<div class="panel panel-modern-green">
					<div class="panel-heading">Nueva votación entre propuestas</div>
					<div class="panel-body">
						@include('partials/errors')

						<form class="form-horizontal" role="form" method="POST" action="">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="action_id" value="{{ $action->id }}">

							<div class="form-group">
								<label class="col-md-4 control-label">* Pregunta:</label>
								<div class="col-md-8">
								    <input type="text" name="question" class="form-control" value="{{ old('title') }}" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label">
									* Opciones:
									<br>
									<span class="light text-muted">(Selecciona las propuestas que participarán de la votación)</span>
								</label>
								<div class="col-md-8">
								    @foreach($proposals as $proposal)
									    <div class="checkbox">
										  <label><input type="checkbox" name="{{$proposal->id}}" >
										  	{{$proposal->title}}
										  </label>
										</div>
									@endforeach
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-8 col-md-offset-4">
									<button type="submit" class="btn btn-default" style="margin-right: 15px;">
										Publicar votación
									</button>
								</div>
							</div>
						</form>
						<span class="text-muted pull-right">* Requerido</span>
					</div>
				</div>		
			</div>
		</div>
	</div>
</div>



@endsection