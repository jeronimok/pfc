@extends('layout')

@section('content')

<div class="jumbotron">
	<div class="container fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-default">
					<div class="panel-heading">Nueva acción participativa</div>
					<div class="panel-body">
						@include('partials/errors')

						<form class="form-horizontal" role="form" method="POST" action="{{ route('settings/create-action') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<div class="form-group">
								<label class="col-md-3 control-label">Título</label>
								<div class="col-md-9">
								    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Descripción</label>
								<div class="col-md-9">
									<textarea class="form-control" rows="5" name="description" required>{{old('description')}}</textarea>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Administrador (email)</label>
								<div class="col-md-9">
								    <input type="email" name="admin_email" value="{{ old('admin_email') }}" class="form-control" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">Funcionalidades</label>
								<div class="col-md-9">
								    <div class="checkbox">
									  <label><input type="checkbox" name="create_p" checked>Crear propuestas</label>
									</div>
									<div class="checkbox">
									  <label><input type="checkbox" name="debate_p" >Debatir propuestas</label>
									</div>
									<div class="checkbox">
									  <label><input type="checkbox" name="support_p" >Apoyar propuestas</label>
									</div>
									<div class="checkbox">
									  <label><input type="checkbox" name="opt_p" >Optar entre alternativas</label>
									</div>
									<div class="checkbox">
									  <label><input type="checkbox" name="audit" >Auditar obras</label>
									</div>
								</div>
							</div>	

							<div class="form-group">
								<div class="col-md-6 col-md-offset-3">
									<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
										Crear acción participativa
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>		
			</div>
		</div>
		
	</div>
</div>
@endsection