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
    <!-- <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap-theme.css"> -->

    <!-- Css local -->
     <link rel="stylesheet" type="text/css" href="/css/app.css?v=<?=time();?>"/> 

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
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
          <ul class="nav navbar-nav">
            <li><a href="{{ route('actions') }}">Acciones participativas</a></li>
            @if (Auth::check() and Auth::user()->role == 'admin')
              <li><a href="{{ route('settings') }}">
                ADMINISTRACIÓN
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a></li>
            @endif
          </ul>

          @if (Auth::guest())
            <div class="navbar-right">
              <a class="btn btn-primary navbar-btn" href="{{ route('login') }}">@lang('auth.login')</a>
              <a class="btn btn-default navbar-btn" href="{{ route('register') }}">@lang('auth.register')</a>
            </div>
          @else
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle navbar-brand" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }} <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Perfil</a></li>
                  <li role="separator" class="divider"></li>
                  <li> <a href="{{ route('logout') }}">@lang('auth.logout')</a> </li>
                </ul>
              </li>
            </ul>
          @endif
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    @yield('content')

    <footer class="footer">
      &copy; 2017 Jerónimo Calace Montú
    </footer>

  </body>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="/bootstrap/js/bootstrap.js"></script>

    @yield('scripts')

</html>