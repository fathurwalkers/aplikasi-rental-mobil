<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('stisla/assets') }}/css/style.css">
  <link rel="stylesheet" href="{{ asset('stisla/assets') }}/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-2">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="{{ asset('stisla/assets') }}/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

              <div class="card-body">
                <form method="POST" action="{{ route('post-register') }}" class="">
                    @csrf
                  <div class="form-group">
                    <label for="login_nama">Nama Lengkap</label>
                    <input id="login_nama" type="text" class="form-control" name="login_nama" tabindex="1" required autofocus>
                    @error('login_nama')
                    <div class="invalid-feedback">
                      silahkan isikan nama anda dengan benar.
                    </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="login_email">Email</label>
                    <input id="login_email" type="email" class="form-control" name="login_email" tabindex="1" required>
                    @error('login_email')
                    <div class="invalid-feedback">
                      silahkan isikan nama anda dengan benar.
                    </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="login_username">Username</label>
                    <input id="login_username" type="text" class="form-control" name="login_username" tabindex="1" required>
                    @error('login_username')
                    <div class="invalid-feedback">
                      silahkan isikan nama anda dengan benar.
                    </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="login_password" tabindex="2" required>
                    @error('login_password')
                    <div class="invalid-feedback">
                      silahkan isikan nama anda dengan benar.
                    </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="login_password2" class="control-label">Konfirmasi Password</label>
                    </div>
                    <input id="login_password2" type="password" class="form-control" name="login_password2" tabindex="2" required>
                  </div>


                  <div class="form-group">
                    <label for="login_telepon">No. HP / Telepon</label>
                    <input id="login_telepon" type="number" class="form-control" name="login_telepon" tabindex="1" required>
                    @error('login_telepon')
                    <div class="invalid-feedback">
                      silahkan isikan nama anda dengan benar.
                    </div>
                    @enderror
                  </div>

                  {{-- <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div> --}}

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      DAFTAR SEKARANG
                    </button>
                  </div>
                </form>

              </div>
            </div>
            <div class="mt-1 text-muted text-center">
              Sudah punya Akun? <a href="{{ route('login') }}">Masuk disini!</a>
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('stisla/assets') }}/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{ asset('stisla/assets') }}/js/scripts.js"></script>
  <script src="{{ asset('stisla/assets') }}/js/custom.js"></script>

  <!-- Page Specific JS File -->
</body>
</html>
