@for ($i = 0; $i < count($proposals); $i=$i+3)
	<div class="card-deck">
	@for ($j = $i; $j < $i+3; $j++)
		@if($j >= count($proposals))
			<div class="card card-holder"></div>
		@else
			<div class="card">
				<a href="{{ route('proposal', ['id' => $proposals[$j]->id]) }}">
					<img class="card-img-top img-fluid" align="center" src="/images/700x400.png" alt="Card image cap">
			    	<div class="card-block">
			    		<h3 class="card-title" style="color: black;">{{ $proposals[$j]->title }}</h3>
			    		<span style="color: black;">{{ substr($proposals[$j]->content, 0, 150) }}...</span>
			    	</div>
			    </a>
	    	</div>
		@endif
		<hr>
	@endfor
	</div>
	<hr>
@endfor

<div class="row text-center">
	<a href="{{ route('create-proposal-form', ['action_id' => $action->id]) }}" class="btn btn-default btn-lg">Crear propuesta</a>
</div>

{!! $proposals->render() !!}