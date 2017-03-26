@extends('layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h2>{{ $proposal->title }}</h2>
		  	<ul class="nav nav-tabs">
		    	<li class="active"><a href="#"> <h4>Propuesta</h4> </a></li>
		  	</ul>
		  	<div class="panel panel-default">
		  		<div class="panel-body"> 
		  			{{ $proposal->content }}
		  		</div>
		  	</div>
		</div>
	</div>

</div>

@endsection