<!DOCTYPE html>
<html>

<head>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title>NHC | Login</title>

      <link href="{{ asset("backend/css/bootstrap.min.css") }}" rel="stylesheet">
      <link href="{{ asset("backend/font-awesome/css/font-awesome.css") }}" rel="stylesheet">

      <link href="{{ asset("backend/css/animate.css") }}" rel="stylesheet">
      <link href="{{ asset("backend/css/style.css") }}" rel="stylesheet">
      <style media="screen">
      .middle-box h1 {
            font-size: 140px;
      }
</style>
</head>

<body class="gray-bg">
      <div class="middle-box text-center loginscreen animated fadeInDown">
            <div>
                  <div>
                        <h1 class="logo-name">NHC</h1>
                  </div>
                  <h3>NHC PHP Application Builder</h3>
                  <!-- <p>
                  Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
            </p> -->
            <form class="m-t text-left" role="form" action="" method="post">
                  {{ csrf_field() }}
                  @if ($errors->has('username'))
                  <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        {{ $errors->first('username') }}
                  </div>
                  @endif
                  <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                        @if($errors->has('email'))
                        <span class="form-text m-b-none">{{ $errors->first('email') }}</span>
                        @endif
                  </div>
                  <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}">
                        @if($errors->has('password'))
                        <span class="form-text m-b-none">{{ $errors->first('password') }}</span>
                        @endif
                  </div>
                  <button type="submit" class="btn btn-info block full-width m-b">Login</button>

                  <a href="#"><small>Forgot password?</small></a>
                  <p class="text-muted text-center"><small>Do not have an account?</small></p>
                  <a class="btn btn-sm btn-white btn-block" href="{{ url('/') }}">Back To Site</a>
            </form>
      </div>
</div>

<!-- Mainly scripts -->
<script src="{{ asset("backend/js/jquery-3.1.1.min.js") }}"></script>
<script src="{{ asset("backend/js/popper.min.js") }}"></script>
<script src="{{ asset("backend/js/bootstrap.js")}}"></script>

</body>

</html>
