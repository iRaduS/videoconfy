@extends('layouts.app')

@section('content')
    <div class="container auth-section">
        <div class="row">
            <div class="col">
                <div class="sign-card">
                    <div class="title">
                        <h4 class="m-0">Login into your Fantastik</h4>
                        <p>Login with your credentials to access your account</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}" class="auth-form">
                        @csrf

                        <div class="mb-3">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password">
                                {{ __('Password') }}
                                <small class="text-muted">
                                    <a class="text-decoration-none text-muted" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                </small>
                            </label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary w-100" type="submit">I&#39;m ready to log in Fantastik</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
