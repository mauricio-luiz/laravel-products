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
     <link href="/css/custom.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            @if(Session::has('global'))
              <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>Ops!</strong> {{ Session::get('global') }}
              </div>
            @elseif(Session::has('success'))
               <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                {{ Session::get('success') }}
              </div>
            @endif
            {!! Form::open(array('action' => 'Auth\LoginController@login', 'class' => 'form'))  !!}
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <h1>ZARB TEST</h1>
              <div>
                  <input type="text" name="email" class="form-control" placeholder="Username" required="" />
                  @if($errors->has("email"))
                    <div class="alert alert-danger" role="alert">{{$errors->first('email')}}</div>
                  @endif
              </div>
              <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <input type="submit" class="btn btn-default submit" style="float:right" value="Login" />
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Novo no site?
                  <a href="{!! URL::route('user_register') !!}" class="to_register"> Criar uma conta </a>
                </p>
                <input id="connected" type="checkbox" name="remember" checked>
                <label for="connected" class="text white" >Me manter conectado.</label>

                <div class="clearfix"></div>
                <br />
              </div>
            {!! Form::close() !!}
          </section>
        </div>
      </div>
    </div>
     <!-- jQuery -->
    <script src="/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/js/bootstrap.min.js"></script>
  </body>
</html>
