<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>Sign In </title>

    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form  method="POST" action="{{ route('login') }}">
              @csrf
              <label style="font-size: 20px !important;">Login Form</label> 
              <div>
                <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Username"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color:red">{{ $message }}</strong>
                        </span>
                    @enderror
              </div>
              <div class="show-password">
                <input type="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password"/> 
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="show-password" id="show-password" value="checkedValue">
                      Show Password
                  </label>
                </div>
                <br>
                @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong style="color:red">{{ $message }}</strong>
                        </span>
                @enderror
              </div>
              <div>
                <button type="submit" class="btn btn-default submit">Log in</button>
              </form>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                  <p class="change_link">New to site?
                      <a href="{{url('register')}}" class="to_register"> Create Account </a>
                    </p>
                <div class="clearfix"></div>
                <br />
                
                <div>
                  <label style="font-size: 20px !important;"><i class="fa fa-paw"></i> Barangay Bagbag</label>
                  <p>©2017 All Rights Reserved. Barangay Bagbag. Privacy and Terms</p>
                </div>
              </div>
          </section>
        </div>
      </div>
    </div>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
        $('#show-password').click(function() {
            if ($('input[name=show-password]').is(':checked')) {
                $('input[name=password').attr('type', 'text')
            } else {
                $('input[name=password]').attr('type', 'password')
            }
        });
    })
  </script>
</html>
