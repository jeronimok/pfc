@extends('layout')

@section('content')
<div class="jumbotron no-bottom">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h2>
					{{ $action->title }}
				</h2>
				<ul class="nav nav-tabs">
	  				<li class="active"><a href="#">Descripción</a></li>
	  				<li><a href="#" class="scroll-link" data-id="propuestas">Propuestas</a></li>
	  			</ul>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
	  		<p class="action-text">{!! nl2br($action->description) !!}</p>
	  		@include('partials/success')
	  		<hr>
		</div>
	</div>
</div>

<div class="jumbotron">
	<div class="container-fluid page-section" id="propuestas">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<h3>
					Propuestas <a href="#" class="scroll-top back-to-top btn btn-default pull-right"><span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span></a>
				</h3>
				<br />
				@include('partials/proposals_list')
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
	// navigation click actions	
	$('.scroll-link').on('click', function(event){
		event.preventDefault();
		var sectionID = $(this).attr("data-id");
		scrollToID('#' + sectionID, 750);
	});
	// scroll to top action
	$('.scroll-top').on('click', function(event) {
		event.preventDefault();
		$('html, body').animate({scrollTop:0}, 'slow'); 		
	});
	// mobile nav toggle
	$('#nav-toggle').on('click', function (event) {
		event.preventDefault();
		$('#main-nav').toggleClass("open");
	});
});
// scroll function
function scrollToID(id, speed){
	var offSet = 50;
	var targetOffset = $(id).offset().top - offSet;
	var mainNav = $('#main-nav');
	$('html,body').animate({scrollTop:targetOffset}, speed);
	if (mainNav.hasClass("open")) {
		mainNav.css("height", "1px").removeClass("in").addClass("collapse");
		mainNav.removeClass("open");
	}
}
if (typeof console === "undefined") {
    console = {
        log: function() { }
    };
}
</script>
@endsection