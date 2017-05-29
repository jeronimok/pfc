<div class="alert" style="background-color: #eee;">
	<p>Noticias y Eventos</p>
	<br>
	<div class="autoplay">
		@foreach($action->newvents() as $newvent)
			<div class="row">
				@if($newvent->type == 'event')
					<div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1" align="center">
						<a href="{{$newvent->link}}" target="_blank">
						  	<div class="panel panel-primary">
						  		<div class="panel-heading" style="text-transform: uppercase;">
						  			{{DateTime::createFromFormat('m-Y', substr($newvent->date, 3))->format('F Y')}}
						  		</div>
						  		<div class="panel-body" style="color: #555;">
						  			<h1 align="center">{{ substr($newvent->date, 0, 2) }}</h1>
						  			<h4>{{$newvent->title}}</h4>
						  		</div>
						  	</div>
						</a>
					</div>
				@else
					<div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<div class="card">
							<a href="{{$newvent->link}}" target="_blank">
						    	<div class="card-block">
						    		<span class="text-muted">{{$newvent->date}}</span>
						    		<h3 class="card-title">{{$newvent->title}}</h3>
						    	</div>
						    </a>
						</div>
					</div>
					<br>
				@endif
			</div>
		@endforeach
	</div>
</div>