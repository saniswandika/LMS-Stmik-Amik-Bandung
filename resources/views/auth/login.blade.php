@extends('layouts.app')

<link href="{{ asset('css/portal.css') }}" rel="stylesheet">
<link href="{{ asset('css/logo.css') }}" rel="stylesheet">


<header  class="jumbotron jumbotron-fluid" role="banner" style="background: linear-gradient(rgba(29, 29, 29, 0.7), rgba(0, 0, 0, 0.5)), url(images/kampus.jpg); max-height: 100%">

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
                    <h2 class="auth-heading text-center mb-5" style="color: aliceblue">Silahkan Login</h2>
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
                                            <strong>E-Mail Dan Password Tidak Sesuai</strong>
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
                                            <label class="form-check-label text-white" for="remember">
                                                {{ __('Ingat Saya') }}
                                            </label>
                                        </div>
                                    </div>
                                    <!--//col-6-->
                                    <div class="col-8">
                                        <div class="forgot-password text-end-blue">
                                            <a href="{{ route('password.request') }}">
                                                {{ __('Lupa Password ?') }}</a>
                                        </div>
                                    </div>
                                    <!--//col-6-->
                                </div>
                                <!--//extra-->
                            </div>
                            <!--//form-group-->
                            <div class="form-group m-3">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                            @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block text-red mt-3">
                                    <strong>Isi reCAPTCHA Terlebih Dahulu</strong>
                                </span>
                            @endif
                                </div>
                        
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary w-100 theme-btn mx-auto invalid-feedback" role="alert">Log In</button>
                            </div>
                        </form>

                        <div class="auth-option text-center pt-5">Buat Akun 
                            <a class="nav-link"
                                href="{{ route('register') }}">{{ __('Daftar') }}</a>.
                            </div>
                    </div>
            </div>
        </div>
        <!--//flex-column-->
    </div>
    <!--//auth-main-col-->
        {{-- <div class="auth-background-overlay p-8 p-lg-4">
        <!--//auth-background-overlay-->
    </div> --}}
</div>


                                
