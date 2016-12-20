<!DOCTYPE html>
<html lang="en">
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Zarb Test - {{isset($data['title']) ? $data['title'] : ''}}</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/master.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="{!! URL::route('dashboard') !!}">Zarb Test</a>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="{!! URL::route('dashboard') !!}">Produtos<span class="sr-only">(current)</span></a></li>
        <li><a href="{!! URL::route('categories') !!}">Categorias<span class="sr-only">(current)</span></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bem vindo, {{Session::has('full_name') ? first_name(Session::get('full_name')) : ''}}<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ URL::route('logout') }}">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
     <div class="container-fluid" role="main">
          @yield('content')
     </div>
     <!-- jQuery -->
    <script src="/js/jquery.js"></script>
    <!-- Bootstrap -->
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.mask.min.js"></script>
    <script src="/js/main.js"></script>
  </body>
</html>
