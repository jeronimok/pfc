@extends('layout')

@section('content')

<div class="jumbotron">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<h2>Iniciar sesión</h2>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			@include('partials/errors')
			@include('partials/success')

			<form role="form" method="POST" action="{{ route('login') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="form-group">
					<label class="control-label">@lang('validation.attributes.email')</label>
					<input type="email" name="email" value="{{ old('email') }}" class="form-control">
				</div>

				<div class="form-group">
					<label class="control-label">@lang('validation.attributes.password')</label>
					<input type="password" name="password" class="form-control">
				</div>

				<div class="form-group">
					<div class="checkbox">
						<label>
							<input type="checkbox" name="remember">@lang('auth.remember_me')
						</label>
					</div>
				</div>

				<div class="form-group">
						<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
							<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>  @lang('auth.login_button')
						</button>

						<a href="/password/email">@lang('auth.forgot_password')</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection