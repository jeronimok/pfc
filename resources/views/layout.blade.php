<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>PFC</title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.css">

    <!-- Optional theme -->
    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap-theme.css">

    <!-- Css local -->
     <link rel="stylesheet" type="text/css" href="/css/app.css"/> 

    <style type="text/css">
      body {
        margin-top: 50px;
      }
    </style>

  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">@lang('layout.home')</a>
          <ul class="nav navbar-nav">
            <li><a href="{{ route('actions') }}">Acciones participativas</a></li>
            @if (Auth::check() and Auth::user()->role == 'admin')
              <li><a href="{{ route('settings') }}">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                @lang('layout.admin_plataforma')
              </a></li>
            @endif
          </ul>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          @if (Auth::guest())
            <div class="navbar-right">
              <a class="btn btn-primary navbar-btn" href="{{ route('login') }}">@lang('auth.login')</a>
              <a class="btn btn-default navbar-btn" href="{{ route('register') }}">@lang('auth.register')</a>
            </div>
          @else
            <div class="navbar-right">
              <a class="navbar-brand">{{ Auth::user()->name }}</a>
              <a class="btn btn-primary navbar-btn" href="{{ route('logout') }}">@lang('auth.logout')</a>
            </div>
          @endif
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        @yield('content')
      </div>
    </div>

    <div class="container">
      
      @yield('bottom_content')

      <hr>

      <footer>
        <p>&copy; 2017 Jerónimo Calace Montú</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="/bootstrap/js/bootstrap.js"></script>

    @yield('scripts')

</html>