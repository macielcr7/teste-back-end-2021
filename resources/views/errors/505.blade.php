@extends('layout.base_login')

{{-- Content --}}
@section('content')
	
	<div class="vd_content-wrapper">
	    <div class="vd_container">
	        <div class="vd_content clearfix">
	            <div class="vd_content-section clearfix">
	                

	            	<div class="vd_register-page">
					    <div class="heading clearfix">
					        <div class="logo">
					            <a route="dashboard.dashboard.index" href="{{ url('/')}}">
					            	<h2 class="mgbt-xs-5"><img src="{{ asset('img/logo.png') }}" height="120px" alt="logo"></h2>
					            </a>
					        </div>
					    </div>
					    <div class="panel widget">
					        <div class="panel-body">
					            <h1 class="font-semibold text-center" style="font-size:52px">505 ERROR</h1>
					            <form class="form-horizontal" action="#" role="form">
					                <div class="form-group">
					                    <div class="col-md-12">
					                        <h4 class="text-center mgbt-xs-20">
					                        	A página solicitada apresentou um erro inesperado. A equipe de suporte já foi notificada.
					                        </h4>
					                        <p class="text-center"> 
					                        	Por favor <a route="dashboard.dashboard.index" href="{{ url('/')}}">clique aqui</a> para voltar para a nossa página inicial.
					                        </p>
					                    </div>
					                </div>
					            </form>
					        </div>
					    </div>
					    <!-- Panel Widget -->
					</div>


	            </div>
	            <!-- .vd_content-section -->
	        </div>
	        <!-- .vd_content -->
	    </div>
	    <!-- .vd_container -->
	</div>

@stop

@section('scripts')
@parent

@stop