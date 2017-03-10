<div class="panel">
	<table class="table">
		@foreach($actions as $action)
		<tr>
			<td class="col-md-4" align="center" valign="middle" >
				<img class="img-responsive" src="http://placehold.it/300x150" alt="...">
			</td>

			<td>
				<h3><a href="">{{ $action->title }}</a></h3>
				<p>{{ substr($action->description, 0, 150) }}...</p>
			</td>
		</tr>
		@endforeach
	</table>
</div>
{!! $actions->render() !!}