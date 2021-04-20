@extends('layout.base_login')

@section('content')
<div class="vd_content-wrapper">
    <div class="vd_container">
        <div class="vd_content clearfix">
            <div class="vd_content-section clearfix">
                <div class="vd_login-page">
                    <div class="heading clearfix">
                        <div class="logo">
                            <h2 class="mgbt-xs-5"><img src="{{ asset('img/logo.png') }}" alt="logo"></h2>
                        </div>
                    </div>
                    <div class="panel widget">
                        <div class="panel-body">
                            <form class="form-horizontal" method="post" role="form" id="forget-password-form" action="{{ route('password.email') }}">
                                @csrf

                                <div class="form-group mgbt-xs-20">
                                    <div class="col-md-12">
                                        <p class="text-center">
                                            <strong>Para redefinir sua senha , digite o endereço de e-mail que você usa para fazer login.</strong> 
                                        </p>
                                        <div class="vd_input-wrapper" id="email-input-wrapper">
                                            <span class="menu-icon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <input type="email" required placeholder="Email" id="email" name="email" class="required" value="{{ old('email') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" id="submit-password-wrapper">
                                    <div class="col-md-12 text-center mgbt-xs-5">
                                        <button class="btn vd_bg-blue vd_white width-100" type="submit" id="submit-password" name="submit-password">Solicitar minha senha</button>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-6">
                                        <a style="color: white!important;" href="{{ route('login') }}">Logar no sistema </a>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <a style="color: white!important;" href="{{ route('register') }}">Cadastrar-se</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->
@endsection
