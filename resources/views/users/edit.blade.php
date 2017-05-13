@extends('layout')


@section('content')


<div class="jumbotron">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				@include('partials/success')
				<h2>Editar perfil</h2>
				Si desea cambiar su contraseña diríjase a 
				<a href="">Cambiar contraseña</a>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<form role="form" method="POST" action="">
			  	<input type="hidden" name="_token" value="{{ csrf_token() }}">
			  	<input type="hidden" name="_method" value="PUT">

			  	<div class="form-group">
			    	<label for="name">Nombre</label>
			    	<input type="text" name="name" value="{{$user->name}}" class="form-control">
			  	</div>
			  	
			  	<div class="form-group">
			    	<label for="email">Email</label>
			    	<input type="email" name="email" value="{{$user->email}}" class="form-control">
			  	</div>

			  	<div class="form-group">
			    	<label for="image">Foto</label>
			    	<br>
			    	<img class="img-fluid img-rounded img-small" src="/images/profile.jpg" alt="Foto de perfil">
			  	</div>

				<br>
			  	<div align="center">
					<button type="submit" class="btn btn-default btn-lg">
				    	Guardar cambios
				  	</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="jumbotron"></div>