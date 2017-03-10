<div class="panel">
	<table class="table">
		@foreach($actions as $action)
		<tr>
			<td class="col-md-4" align="center" valign="middle" >
				<img class="img-responsive" src="http://placehold.it/300x150" alt="...">
			</td>

			<td>
				<h3><a href="{{ route('action', ['id' => $action->id]) }}">{{ $action->title }}</a></h3>
				{{ substr($action->description, 0, 150) }}...
			</td>
		</tr>
		@endforeach
	</table>
</div>
{!! $actions->render() !!}
