@extends('layout')

@section('content')
<div class="jumbotron">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 col-md-offset-1" align="center">
          <h1 >PARTICIPACIÓN CIUDADANA</h1>
          <p>Bienvenidos a la plataforma web de participación ciudadana de la Ciudad de Santa Fe</p>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
        @include('partials/actions_list')
    </div>
  </div>
</div>


@endsection