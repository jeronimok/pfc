@foreach($comments as $comment)
	<div class="card">
		<div class="card-block"> 
			<a href="{{route('user', $comment->user->id)}}">{{ $comment->user->name }}</a>
			@if(Gate::allows('edit_comment', $comment))
				<div class="dropdown pull-right">
				  <button class="btn btn-modern dropdown-toggle" type="button" data-toggle="dropdown">
				  	<span class="caret"></span></button>
				  </button>
				  <ul class="dropdown-menu">
				    <li>
				    	<a href="{{route('comment.edit', $comment->id)}}"><i class="fa fa-edit" aria-hidden="true"></i> Editar comentario</a>
				    </li>
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
							><i class="fa fa-trash" aria-hidden="true"></i> Eliminar comentario
							</button>
						</form>
				    </li>
				  </ul>
				</div>
			@endif
			<br>
			<small>{{$comment->updated_at}}</small>
			<br>
			<div class="proposal-comment">{!! nl2br($comment->comment) !!}</div>
			<hr>

			<div id="likes_section" align="right">
				@if(Gate::allows('like_comment', $comment))
					<form id="like_comment{{$comment->id}}" role="form" method="POST" onsubmit="likeComment({{$comment->id}})" action="{{ route('comment.like')}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="comment_id" value="{{ $comment->id }}">
						
						<button type="submit" class="btn btn-default">
						  <i class="fa fa-heart-o" aria-hidden="true"></i>
						</button>
						&nbsp;
						<span class="proposal-text nlikes{{$comment->id}}"> {{count($comment->likers)}}</span>
					</form>
					<form class="hidden unlike_comment" id="unlike_comment{{$comment->id}}" role="form" method="POST" onsubmit="unlikeComment({{$comment->id}})" action="{{ route('comment.unlike')}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="comment_id" value="{{ $comment->id }}">
						<input type="hidden" name="_method" value="DELETE">
						
						<button type="submit" class="btn btn-default">
						  <i class="fa fa-heart" aria-hidden="true" style="color: #ff5555;"></i>
						</button>
						&nbsp;
						<span class="proposal-text nlikes{{$comment->id}}"> {{count($comment->likers)}}</span>
					</form>
				@elseif(Auth::check())
					<form class="unlike_comment" id="unlike_comment{{$comment->id}}" role="form" method="POST" onsubmit="unlikeComment({{$comment->id}})" action="{{ route('comment.unlike')}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="comment_id" value="{{ $comment->id }}">
						<input type="hidden" name="_method" value="DELETE">
						
						<button type="submit" class="btn btn-default">
						  <i class="fa fa-heart" aria-hidden="true" style="color: #ff5555;"></i>
						</button>
						&nbsp;
						<span class="proposal-text nlikes{{$comment->id}}"> {{count($comment->likers)}}</span>
					</form>
					<form class="hidden" id="like_comment{{$comment->id}}" class="like_comment" role="form" method="POST" onsubmit="likeComment({{$comment->id}})" action="{{ route('comment.like')}}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="comment_id" value="{{ $comment->id }}">
						
						<button type="submit" class="btn btn-default">
						  <i class="fa fa-heart-o" aria-hidden="true"></i>
						</button>
						&nbsp;
						<span class="proposal-text nlikes{{$comment->id}}"> {{count($comment->likers)}}</span>
					</form>
				@else
					<i class="fa fa-heart" aria-hidden="true" style="color: #ff5555;"></i>
					&nbsp;	
					<span class="proposal-text">{{count($comment->likers)}}</span>
				@endif
	
			</div>
			
		</div>
	</div>
	<br>
@endforeach
<hr>