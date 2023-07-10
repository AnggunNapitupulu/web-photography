@extends('layouts.userTemplate')

@section('content')
<div class="inner-page-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="header-page-title">
                    <h2>Reset Password</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="header-page-locator">
                    <ul>
                        <li><a href="{{route('base')}}">Home /</a> Reset Password</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="loginregistration-area pt-100 pb-100">
    <div class="container center">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 mb-sm-30">
                <div class="login-area">
                    <h2>Reset Password</h2>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('password.email') }}">
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
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button class="btn-send" type="submit">Send Reset Link</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection