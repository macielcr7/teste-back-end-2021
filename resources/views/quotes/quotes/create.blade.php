@extends('layout.base')

@section('breadcrumb')
@parent
    <li><a href="{{ url('/')}}">Home</a> </li>
    <li><a href="{{ route('quotes.index')}}">Manutenção de Cotações</a> </li>
    <li class="active">Cadastro</li>
@stop

{{-- Content --}}
@section('content')
    <div class="vd_title-section clearfix">
        <div class="vd_panel-header">
            <h1>Cadastro de Cotações</h1>
            <small class="subtitle">Formulário para cadastro de Cotações</small>
        </div>
    </div>
    <div class="vd_content-section clearfix">
    	<div class="panel widget">
            <div class="panel-body">
		        <form class="form-horizontal data-form" action="{{ route('quotes.store') }}" method="post">
		            @include('quotes.quotes.form')
		        </form>
    		</div>
    	</div>
    </div>
    <!-- .vd_content -->
@stop
