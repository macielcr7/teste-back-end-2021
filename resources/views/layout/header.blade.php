<!DOCTYPE html>
    <!--[if IE 8]>          <html class="ie ie8"> <![endif]-->
    <!--[if IE 9]>          <html class="ie ie9"> <![endif]-->
    <!--[if gt IE 9]><!-->  <html><!--<![endif]-->

    <!-- Specific Page Data -->
    <!-- End of Data -->

    <head>
        <meta charset="utf-8" />
        <title>{{ config('app.name') }}</title>
        <meta name="keywords" content="portal,Vendas" />
        <meta name="description" content="Vendas">
        <meta name="author" content="Maciel">
        
        <!-- Set the viewport width to device width for mobile -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    

        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('img/ico/apple-touch-icon-144-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('img/ico/apple-touch-icon-114-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('img/ico/apple-touch-icon-72-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('img/ico/apple-touch-icon-57-precomposed.png') }}">
        <link rel="shortcut icon" href="{{ asset('img/ico/'.\Session::get('favico')) }}">

        <link href="{{ asset('css/header_all.css') }}" rel="stylesheet" type="text/css"> 
        
        <script type="text/javascript">
            window.__TEMPO_NOTIFICACAO = 2;
            
            window.__URL_BASE = "{{ url('/') }}";
            window.__NOME_SISTEMA_AVISO = "{{ config('app.name') }} - Aviso";
            window._ROOT_PATH = '{{ asset('/') }}';
            window._URLS = {};
        </script>     

        <!-- for specific page in style css -->
        @yield('styles')
        <!-- for specific page responsive in style css -->
            
        
        <!-- Custom CSS -->
        <link href="{{ asset('custom/custom.css') }}" rel="stylesheet" type="text/css">

        <script type="text/javascript" src="{{ asset('js/header_all.js') }}"></script> 
     
        <!-- HTML5 shim and Respond IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script type="text/javascript" src="{{ asset('js/html5shiv.js') }}"></script>
          <script type="text/javascript" src="{{ asset('js/respond.min.js') }}"></script>     
        <![endif]-->    

        <style type="text/css">
            .mega-slider{
                padding-top: 20px!important;
                width: 200px;
                margin-right: 20px!important;
            }
            .mega-game{
                padding-top: 5px!important;
            }


            .table-responsive{
                max-width: 100%!important;
                overflow-y: auto!important;
            }
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
            .ball.s5 {
                -moz-animation: spin 3s infinite linear;
                -webkit-animation: spin 3s infinite linear;
            }
            .ball1.s5 {
                -moz-animation: spinoff 3s infinite linear;
                -webkit-animation: spinoff 3s infinite linear;
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

            .message-container{
                color: black;
                font-size: 15px;
                position: absolute;
                top: 65%;
                left: 40%;
                background: white;
                padding: 2px 10px;
                border-radius: 5px;
                box-shadow: 0 0 20px #428bca;
                display: none;
            }
        </style>
    </head>    

    <body id="layouts" class="full-layout no-nav-right nav-top-fixed responsive clearfix" data-active="layouts "  data-smooth-scrolling="1"> 
        <div class="blockUI blockOverlay">
            <div class="message-container"></div>
            <div class="ball"></div>
            <div class="ball1"></div>
        </div>