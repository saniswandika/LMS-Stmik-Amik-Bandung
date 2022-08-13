@extends('layouts.app')

@section('content')
<link href="{{ asset('css/portal.css') }}" rel="stylesheet">
<link href="{{ asset('css/logo.css') }}" rel="stylesheet">


<div class="row g-0 app-auth-wrapper">
    <div class="col-12 col-md-5 col-lg-12 auth-main-col text-center p-5">
        <div class="d-flex flex-column align-content-center">

            <div class="app-auth-body mx-auto">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="app-auth-branding mb-4"><a href="/"> <img class="logo5"
                                src="{{ asset('images/amik.png') }}"></a>
                    </div>
                    <h2 class="auth-heading text-center mb-0">Reset Password</h2>
                    <div class="auth-form-container text-start">
                        <div class="card-body">
                            <p style="text-align: left">Enter your Email and we'll send you a link to <br>change your password.</p>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
        
                                <div class="row mt-0">
                                    <label for="email" class="col-md-3 col-form-label text-md-end">{{ __('E-Mail') }}</label>
        
                                    <div class="col-md-15">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mr-0">
                                    <div class="mb-2 mt-2">
                                    <div class="forgot-password text-end">
                                        <a href="{{ route('login') }}">
                                            {{ __('Back To Login') }}</a>
                                    </div>
                                        </div>
                                </div>
                          
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                        
                                    <!--//col-6-->
                                  
                                    <!--//col-6-->
                                </div>
                                <!--//extra-->
                            </div>
                            <!--//form-group-->
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
@endsection
