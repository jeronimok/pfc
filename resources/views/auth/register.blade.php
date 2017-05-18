@extends('layout')

@section('content')

<div class="jumbotron">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<h2>Registrarse</h2>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			@include('partials/errors')
			@include('partials/success')

			<a href="redirect/facebook" class="btn btn-block btn-social btn-facebook btn-lg">
			    <span class="fa fa-facebook"></span> Registrarse con Facebook
			</a>

			<hr>
			<p>O con su correo electrónico:</p>


			<form role="form" method="POST" action="{{ route('register') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="form-group">
					<label class="control-label">@lang('validation.attributes.name')</label>
					<input type="text" class="form-control" name="name" value="{{ old('name') }}">
				</div>

				<div class="form-group">
					<label class="control-label">@lang('validation.attributes.email')</label>
					<input type="email" class="form-control" name="email" value="{{ old('email') }}">
				</div>

				<div class="form-group">
					<label class="control-label">@lang('validation.attributes.password')</label>
					<input type="password" class="form-control" name="password">
				</div>

				<div class="form-group">
					<label class="control-label">@lang('validation.attributes.password_confirmation')</label>
					<input type="password" class="form-control" name="password_confirmation">
				</div>

				<div class="form-group">
					{!! Recaptcha::render() !!}
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span> @lang('auth.register_button')
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection