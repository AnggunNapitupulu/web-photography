@extends('layouts.userTemplate')

@section('content')
<!-- Inner Page Header serction start here -->
<div class="inner-page-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="header-page-title">
                    <h2>Login and Registration</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="header-page-locator">
                    <ul>
                        <li><a href="{{route('base')}}">Home /</a> Login and Registration</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Inner Page Header serction end here -->

<!-- Login and Registration start Here -->
<div class="loginregistration-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 mb-sm-30">
                <div class="login-area">
                    <h2>Login</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <fieldset>
                            <div class="col-sm-12">
                                @if (session('message'))
                                <div class="alert alert-warning">
                                    {{ \Str::upper(session('message')) }}
                                </div>
                                @endif
                                <div class="form-group">
                                    <label>Email *</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
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
                                            <p><a href="{{route('password.request')}}">Lost your password?</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button class="btn-send" type="submit">Login</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="registration-area">
                    <h2>Registration</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <fieldset>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Full Name *</label>
                                    <input id="name1" type="text"
                                        class="form-control @error('name1') is-invalid @enderror" name="name1"
                                        value="{{ old('name1') }}" required autocomplete="name" autofocus>
                                    @error('name1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label> E-mail</label>
                                    <input id="email1" type="email"
                                        class="form-control @error('email1') is-invalid @enderror" name="email1"
                                        value="{{ old('email1') }}" required autocomplete="email">
                                    @error('email1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="password1" type="password"
                                        class="form-control @error('password1') is-invalid @enderror" name="password1"
                                        required autocomplete="new-password">
                                    @error('password1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label> Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button class="btn-send" type="submit">Sign Up!</button>
                                </div>
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