<div class="panel">
	<table class="table">
		@foreach($proposals as $proposal)
		<tr>
			<td class="col-md-4" align="center" valign="middle" >
				<img class="img-responsive" src="/images/300x150.png" alt="...">
			</td>

			<td>
				<h3><a href="">{{ $proposal->title }}</a></h3>
				{{ substr($proposal->content, 0, 150) }}...
			</td>
		</tr>
		@endforeach
	</table>
</div>
{!! $proposals->render() !!}