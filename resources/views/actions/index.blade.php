@extends('layout')

@section('content')

<table class="table">
	<tr>
		<th>Nombre</th>
		<th>Administrador</th>
	</tr>
	@foreach($actions as $action)
	<tr>
		<td>{{ $action->title }}</td>
		<td>{{ $action->admin_email }}</td>
	</tr>
	@endforeach
</table>
{!! $actions->render() !!}

@endsection