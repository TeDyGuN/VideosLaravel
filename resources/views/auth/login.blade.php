<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Videos</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>

  <div class="wrapper">

    <img src="{{ asset('img/logo-entrada.png') }}" alt="" class="img-responsive img-login" width="300px">
    <form class="login animated fadeIn slow" method="POST" action="{{ route('login') }}" >
        {{ csrf_field() }}

        <p class="title">Iniciar Sesión</p>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="email" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus class="user"/>
            <i class="fa fa-user"></i>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" placeholder="Contraseña" name="password" id="password"/>
            <i class="fa fa-key"></i>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <button type="submit">
            <span class="state">Ingresar</span>
        </button>
    </form>
    <div class="perron">

      <a href="{{ url('/') }}" style="margin-right: -5px;">
        <button  class="btn btn-primary button-ing">
            Inicio
        </button>
      </a>
      <a href="{{ route('register') }}">
        <button  class="btn btn-warning button-ing2">
            Registrar
        </button>
      </a>
    </div>


    <footer><a target="blank" href="https://web-gama.com/">Copyright 2017 Full Equipo Bolivia <br>Powered by GAMA Market Solutions</a></footer>

  </div>

</body>
</html>
