@extends('layouts.app')

<link href="{{ asset('css/portal.css') }}" rel="stylesheet">
<link href="{{ asset('css/logo.css') }}" rel="stylesheet">


<header class="jumbotron jumbotron-fluid" role="banner" style="background-image: url(images/.jpg);">

<title>Login</title>
<div class="row g-0 app-auth-wrapper">
    <div class="col-12 col-md-5 col-lg-12 auth-main-col text-center p-5">
        <div class="d-flex flex-column align-content-center">

            <div class="app-auth-body mx-auto">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="app-auth-branding mb-4"><a href="/"> <img class="logo5"
                                src="{{ asset('images/amik.png') }}"></a>
                    </div>
                    <h2 class="auth-heading text-center mb-5">Login To Dashboard</h2>
                    <div class="auth-form-container text-start">
                        <form class="auth-form login-form">
                            <div class="email mb-3">
                                <div class="col-md-13">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" placeholder="E-Mail" required
                                        autocomplete ="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!--//form-group-->
                            <div class="password mb-3">


                                <div class="col-md-13">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" placeholder="Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="extra mt-3 row justify-content-between">
                                    <div class="col-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                    <!--//col-6-->
                                    <div class="col-7">
                                        <div class="forgot-password text-end">
                                            <a href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}</a>
                                        </div>
                                    </div>
                                    <!--//col-6-->
                                </div>
                                <!--//extra-->
                            </div>
                            <!--//form-group-->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-100 theme-btn mx-auto">Log
                                    In</button>
                            </div>
                        </form>

                        <div class="auth-option text-center pt-5">No Account? Sign up <a class="nav-link"
                                href="{{ route('register') }}">{{ __('Register') }}</a>.</div>
                    </div>
                
                    <!--//auth-form-container-->

            </div>
            <!--//auth-body-->
               
            <!--//app-auth-footer-->
        </div>
        <!--//flex-column-->
    </div>
    <!--//auth-main-col-->
    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
        <div class="auth-background-holder">

        </div>
     
        <div class="auth-background-overlay p-3 p-lg-5">
            <div class="d-flex flex-column align-content-end h-100">
            </div>
        </div>
        <!--//auth-background-overlay-->
    </div>
    <!--//auth-background-col-->

</div>

<!--//row-->
                                
