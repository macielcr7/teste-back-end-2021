<!DOCTYPE html>
    <!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
    <!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
    <!--[if gt IE 9]><!-->	<html><!--<![endif]-->

    <!-- Specific Page Data -->
    <!-- End of Data -->

    <head>
        <meta charset="utf-8" />
        <title>{{ config('app.name') }}</title>
        <meta name="keywords" content="{{ config('app.name') }}" />
        <meta name="description" content="{{ config('app.name') }}">
        <meta name="author" content="{{ config('app.name') }}">
        
        <!-- Set the viewport width to device width for mobile -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    

        <!-- Fav and touch icons -->
        <link rel="shortcut icon" href="{{ asset('img/ico/'.\Session::get('favico')) }}">
            
        <!-- CSS -->
           
        <!-- Bootstrap & FontAwesome & Entypo CSS -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        <!--[if IE 7]><link type="text/css" rel="stylesheet" href="{{ asset('css/font-awesome-ie7.min.css') }}"><![endif]-->
        <link href="{{ asset('css/font-entypo.css') }}" rel="stylesheet" type="text/css">    

        <!-- Fonts CSS -->
        <link href="{{ asset('css/fonts.css') }}"  rel="stylesheet" type="text/css">
                   
        <!-- Plugin CSS -->
        <link href="{{ asset('plugins/jquery-ui/jquery-ui.custom.min.css') }}" rel="stylesheet" type="text/css">    
        <link href="{{ asset('plugins/pnotify/css/jquery.pnotify.css') }}" media="screen" rel="stylesheet" type="text/css"> 
         

    	<!-- Specific CSS -->
         
        <!-- Theme CSS -->
        <link href="{{ asset('css/theme.css') }}" rel="stylesheet" type="text/css">
        <!--[if IE]> <link href="{{ asset('css/ie.css') }}" rel="stylesheet" > <![endif]-->
        <link href="{{ asset('css/chrome.css') }}" rel="stylesheet" type="text/chrome"> <!-- chrome only css -->    
            
        <!-- Responsive CSS -->
       	<link href="{{ asset('css/theme-responsive.min.css') }}" rel="stylesheet" type="text/css"> 
     
        <style type="text/css">
            .login-layout .logo{
                margin-bottom:35px;
            }
        </style>
        <style type="text/css">
            .blockUI{
                z-index: 9999;
                border: none;
                margin: 0px;
                padding: 0px;
                width: 100%;
                height: 100%;
                top: 0px;
                left: 0px;
                opacity: .5;
                cursor: wait;
                position: fixed;
                background-color: #000;
            }
            .ball {
                background-color: rgba(0,0,0,0);
                border: 5px solid rgba(0,183,229,0.9);
                opacity: .9;
                border-top: 5px solid rgba(0,0,0,0);
                border-left: 5px solid rgba(0,0,0,0);
                border-radius: 50px;
                box-shadow: 0 0 35px #2187e7;
                width: 50px;
                height: 50px;
                margin: 0 auto;
                -moz-animation: spin .5s infinite linear;
                -webkit-animation: spin .5s infinite linear;
                position: absolute;
                left: 49%;
                top: 49%;
            }

            .ball1 {
                background-color: rgba(0,0,0,0);
                border: 5px solid rgba(0,183,229,0.9);
                opacity: .9;
                border-top: 5px solid rgba(0,0,0,0);
                border-left: 5px solid rgba(0,0,0,0);
                border-radius: 50px;
                box-shadow: 0 0 15px #2187e7;
                width: 30px;
                height: 30px;
                margin: 0 auto;
                position: absolute;
                top: 49%;
                -moz-animation: spinoff .5s infinite linear;
                -webkit-animation: spinoff .5s infinite linear;
                left: 49%;
                margin-left: 10px;
                margin-top: 10px;
            }

            @-moz-keyframes spin {
                0% {
                    -moz-transform: rotate(0deg);
                }

                100% {
                    -moz-transform: rotate(360deg);
                };
            }

            @-moz-keyframes spinoff {
                0% {
                    -moz-transform: rotate(0deg);
                }

                100% {
                    -moz-transform: rotate(-360deg);
                };
            }

            @-webkit-keyframes spin {
                0% {
                    -webkit-transform: rotate(0deg);
                }

                100% {
                    -webkit-transform: rotate(360deg);
                };
            }

            @-webkit-keyframes spinoff {
                0% {
                    -webkit-transform: rotate(0deg);
                }

                100% {
                    -webkit-transform: rotate(-360deg);
                };
            }
            
        </style>
        <script type="text/javascript">
            window.__NOME_SISTEMA_AVISO = '{{ config('app.name') }}';
        </script>
        <!-- for specific page in style css -->
        @yield('styles')
        <!-- for specific page responsive in style css -->
            
        
        <!-- Custom CSS -->
        <link href="{{ asset('custom/custom.css') }}" rel="stylesheet" type="text/css">

        <!-- Head SCRIPTS -->
        <script type="text/javascript" src="{{ asset('js/modernizr.js') }}"></script> 
        <script type="text/javascript" src="{{ asset('js/mobile-detect.min.js') }}"></script> 
        <script type="text/javascript" src="{{ asset('js/mobile-detect-modernizr.js') }}"></script> 
     
        <!-- HTML5 shim and Respond IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script type="text/javascript" src="{{ asset('js/html5shiv.js') }}"></script>
          <script type="text/javascript" src="{{ asset('js/respond.min.js') }}"></script>     
        <![endif]-->    
    </head>    

    <body id="pages" class="full-layout no-nav-left no-nav-right  nav-top-fixed background-login responsive remove-navbar login-layout   clearfix" data-active="pages"  data-smooth-scrolling="1"> 
        <div class="blockUI blockOverlay">
            <div class="ball"></div>
            <div class="ball1"></div>            
        </div>
        <div class="vd_body">

            <div class="content">
                <div class="container">
                    
                    @yield('content')

                </div>
            </div>
            
        </div>

        <!-- .vd_body END  -->
        <a id="back-top" href="#" data-action="backtop" class="vd_back-top visible"> <i class="fa  fa-angle-up"> </i> </a>

    </div>

@include('layout.footer')
        