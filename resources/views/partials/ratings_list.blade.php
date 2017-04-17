@foreach($work->ratings as $rating)
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
				<a href="">{{ $rating->user->name }}</a>
				<br>
				<small>{{$rating->updated_at}}</small>
			</div>
		</div>
	</div>
	<br>
@endforeach
<hr>