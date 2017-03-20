@extends('layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h2>{{ $action->title }}</h2>
			<div class="panel panel-default">
				<div class="panel-heading">Nueva propuesta</div>
				<div class="panel-body">
					@include('partials/errors')

					<form class="form-horizontal" role="form" method="POST" action="{{ route('create-proposal', ['id' => $action->id]) }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="action_id" value="{{ $action->id }}">

						<div class="form-group">
							<label class="col-md-3 control-label">Título</label>
							<div class="col-md-9">
							    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label">Contenido</label>
							<div class="col-md-9">
								<textarea class="form-control" rows="5" name="content" required>{{old('content')}}</textarea>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-3">
								<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
									Publicar propuesta
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>		
		</div>
	</div>
</div>



@endsection