@extends('layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">@lang('auth.login')</div>
				<div class="panel-body">
					@include('partials/errors')

					@if(Session::has('alert'))
						<p class="alert alert-success">
							{{ Session::get('alert') }}
						</p>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">@lang('validation.attributes.email')</label>
							<div class="col-md-6">
							    <input type="email" name="email" value="{{ old('email') }}" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">@lang('validation.attributes.password')</label>
							<div class="col-md-6">
								<input type="password" name="password" class="form-control">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember">@lang('auth.remember_me')
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
									@lang('auth.login_button')
								</button>

								<a href="/password/email">@lang('auth.forgot_password')</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection