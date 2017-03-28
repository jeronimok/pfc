@foreach($comments as $comment)
	<div class="card">
		<div class="card-block"> 
			<a href="">{{ $comment->user_name }}</a>
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