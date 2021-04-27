@extends('layouts.auth')

@section('content')
<div class="row justify-content-center">
<div class="container">
    
        <div class="col-md-12">
            <div class="card login-card">
                <div class="backgroundLogin"></div>
                <div class="imgText1Login"></div>
                <div class="imgText2Login"></div>
                <div class="card-body">
                    <form id="fromLogin" class="col-md-5 float-right" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="title">Sign In</div>
                        <div class="form-group row">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror itemInput" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror itemInput" name="password" placeholder="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <button type="submit" class="itemBtn btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                        <div class="form-group row">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                        @if (isset($_GET["message"]))
                                <div class="w-100 text-center bg-danger text-white font-weight-bold ">{{$_GET["message"]}}</div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

