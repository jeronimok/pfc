@extends('layout')

@section('content')
	<h1>Participación ciudadana</h1>
	<p>Bienvenidos a la plataforma web de participación ciudadana de la Ciudad de Santa Fe</p>
  <a href="{{route('actions')}}" class="btn btn-primary btn-lg">Ver acciones participativas</a>
@endsection

@section('bottom_content')
<style type="text/css">
  .glyphicon.glyphicon-plus, .glyphicon-transfer, .glyphicon-check {
    font-size: 50px;
}
</style>
<!-- Example row of columns -->
<div class="row">
  <div class="col-md-4">

    <h2 align="center">
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
      <br>
      Proponer
    </h2>
    
    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. </p>
  </div>


  <div class="col-md-4">

    <h2 align="center">
      <span class="glyphicon glyphicon-transfer" aria-hidden="true"></span>
      <br>
      Debatir
    </h2>

    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. </p>
  </div>


  <div class="col-md-4">

    <h2 align="center">
      <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
      <br>
      Auditar
    </h2>

    <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. </p>
  </div>
</div>
@endsection