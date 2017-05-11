@extends('layout')

@section('content')

<div class="jumbotron">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				@include('partials/success')
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2 col-md-offset-2" align="center">
			<img class="img-fluid img-circle" src="/images/profile.jpg" alt="Foto de perfil">
		</div>
		<div class="col-md-6">
			<h2>{{$user->name}}</h2>
			<p>
				Propuestas creadas: <strong>{{count($user->proposals)}}</strong>
				<br>
				Comentarios realizados: <strong>{{count($user->comments)}}</strong>
				<br>
				Obras calificadas: <strong>{{count($user->ratings)}}</strong>
			</p>
		</div>
		
	</div>
</div>
<br>

<div class="jumbotron jumbottom">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				
				@if(count($user->proposals) > 0)
					<h3>Propuestas</h3>
					<br>
				  	@for ($i = 0; $i < count($user->proposals); $i=$i+3)
						<div class="card-deck">
						@for ($j = $i; $j < $i+3; $j++)
							@if($j >= count($user->proposals))
								<div class="card card-holder"></div>
							@else
								<div class="card">
									<a href="{{ route('proposal', ['id' => $user->proposals[$j]->id]) }}">
										<img class="card-img-top img-fluid" align="center" src="/images/proposal.jpg" alt="Card image cap">
								    	<div class="card-block">
								    		<h4 class="card-title" style="color: black;">{{ $user->proposals[$j]->title }}</h4>
								    	</div>
								    </a>
						    	</div>
							@endif
							<hr>
						@endfor
						</div>
						<br>
					@endfor
				@endif

				@if(count($user->comments) > 0)
				  	<h3>Comentarios</h3>
				  	<br>
				  	@foreach($user->comments as $comment)
				  		<div class="card">
							<div class="card-block"> 
								En <a href="{{ route('proposal', ['id' => $comment->proposal->id]) }}">{{ $comment->proposal->title }}</a>
								@if(Gate::allows('edit_comment', $comment))
									<div class="dropdown pull-right">
									  <button class="btn btn-modern dropdown-toggle" type="button" data-toggle="dropdown">
									  	<span class="caret"></span></button>
									  </button>
									  <ul class="dropdown-menu">
									    <li>
									    	<a href="">Editar comentario</a>
									    </li>
									    @if(Gate::allows('admin_action', $comment->proposal->action_id))
										    <li role="separator" class="divider"></li>
										    <li>
										    	<form role="form" method="POST" action="{{ route('comment.delete')}}">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
													<input type="hidden" name="comment_id" value="{{ $comment->id }}">
													<input type="hidden" name="_method" value="DELETE">
													<button type="submit" class="btn btn-danger btn-block rect"
													data-toggle="confirmation"
													data-popout="true"
													data-placement="bottom"
													data-btn-ok-label="Si"
											        data-btn-cancel-label="No"
											        data-title="¿Estás seguro de que deseas eliminarlo?"
													>
													  Eliminar comentario
													</button>
												</form>
										    </li>
										   @endif
									  </ul>
									</div>
								@endif
								<br>
								<small>{{$comment->updated_at}}</small>
								<br>
								<div class="proposal-comment">{!! nl2br($comment->comment) !!}</div>
								<hr>
								<span class="glyphicon glyphicon-heart pull-right" aria-hidden="true"> 0</span>
							</div>
						</div>
						<br>
				  	@endforeach
				@endif

				@if(count($user->ratings) > 0)
				  	<h3>Calificaciones</h3>
				  	<br>
				  	@foreach($user->ratings as $rating)
						<div class="card">
							<div class="card-block"> 
								@for($i=0; $i < $rating->stars; $i++)
									<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
								@endfor
								@for($i=$rating->stars; $i < 5; $i++)
									<span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
								@endfor
								<br>
								<div class="proposal-comment">{!! nl2br($rating->comment) !!}</div>
								<hr>
								<div class="pull-right">
									En <a href="{{ route('works', $rating->work->id )}}">{{ $rating->work->title }}</a>
									<br>
									<small>{{$rating->updated_at}}</small>
								</div>
							</div>
						</div>
						<br>
					@endforeach
				@endif

			</div>
		</div>
	</div>
</div>

@endsection
