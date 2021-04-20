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

                                <form class="form-horizontal" id="login-form" method="post" action="{{ url('login') }}" role="form">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                                    <div class="alert alert-success vd_hidden">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="icon-cross"></i></button>
                                        <span class="vd_alert-icon"><i class="fa fa-check-circle vd_green"></i></span><strong>Ok! Estamos redirecionando!</strong>.
                                    </div>
                                    <div class="form-group mgbt-xs-20">
                                        <div class="col-md-12">
                                            <div class="label-wrapper sr-only">
                                                <label class="control-label">Login</label>
                                            </div>
                                            <div class="vd_input-wrapper" id="login-input-wrapper"> <span class="menu-icon"> <i class="fa fa-user"></i> </span>
                                                <input type="text" placeholder="Login de Acesso" name="email" class="required" required value="{{ old('email') }}">
                                            </div>
                                            <div class="label-wrapper">
                                                <label class="control-label sr-only" for="password">Senha</label>
                                            </div>
                                            <div class="vd_input-wrapper" id="password-input-wrapper"> <span class="menu-icon"> <i class="fa fa-lock"></i> </span>
                                                <input type="password" placeholder="Senha" id="password" name="password" class="required" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12 text-center mgbt-xs-5">
                                            <button class="btn vd_bg-blue vd_white width-100" type="submit" id="login-submit">Login</button>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-xs-6" style="padding-top: 4px;">
                                                    <a style="color: white!important;" href="{{ route('register') }}">Cadastre-se </a>
                                                </div>
                                                <div class="col-xs-6 text-right" style="padding-top: 4px;">
                                                    <a style="color: black!important;" href="#">Esqueceu a senha? </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <!-- Panel Widget -->
                    </div>
                    <!-- vd_login-page -->

                </div>
                <!-- .vd_content-section -->

            </div>
            <!-- .vd_content -->
        </div>
    </div>
@endsection
