@foreach($comments as $comment)
	<div class="card">
		<div class="card-block"> 
			<a href="">{{ $comment->user_name }}</a>
			@if(Gate::allows('edit_comment', $comment))
				<div class="dropdown pull-right">
				  <button class="btn btn-modern dropdown-toggle" type="button" data-toggle="dropdown">
				  	<span class="caret"></span></button>
				  </button>
				  <ul class="dropdown-menu">
				    <li>
				    	<a href="">Editar comentario</a>
				    </li>
				    @if(Gate::allows('admin_action', $proposal->action_id))
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
<hr>