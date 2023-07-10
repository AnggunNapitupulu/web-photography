@extends('layouts.userTemplate')

@section('content')
  <!-- Inner Page Header serction start here -->
  <div class="inner-page-header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="header-page-title">
            <h2>Login User</h2>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="header-page-locator">
            <ul>
              <li><a href="{{ route('base') }}">Home /</a> Login User</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Inner Page Header serction end here -->

  <!-- Login start Here -->
  <div class="loginregistration-area pt-100 pb-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 mb-sm-30">
          <div class="login-area">
            <h2>Login</h2>
            <form method="POST" action="{{ route('user.auth.login') }}">
              @csrf
              <fieldset>
                <input type="hidden" name="role" value="Admin" readonly="readonly">
                <div class="col-sm-12">
                  @if (session('message'))
                    <div class="alert alert-warning">
                      {{ \Str::upper(session('message')) }}
                    </div>
                  @endif
                  <div class="form-group">
                    <label>Email *</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                      value="{{ old('email') }}" autocomplete="email" autofocus>

                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                      name="password" autocomplete="current-password">
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <div class="connected-area">
                      <div class="checkbox">
                        <p><a href="{{ route('password.request') }}">Lost your password? | <a
                              href="{{ route('user.auth.register') }}">Don't have an account ?</a></a></p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 text-center">
                  <div class="form-group">
                    <button class="btn-send" type="submit">Login</button>
                  </div>
                  <p class="my-4">Or</p>
                  <a href="{{ route('user.auth.login-admin') }}">Login as Admin</a>
                </div>
              </fieldset>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login and Registration End Here -->
@endsection
