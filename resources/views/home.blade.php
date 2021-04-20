@extends('layout.base')

@section('breadcrumb')
@parent
    <li><a route="dashboard.dashboard.index" href="{{ url('/')}}">Home</a> </li>
    <li class="active">Dashboard</li>
@stop

{{-- Content --}}
@section('content')
   <div class="vd_title-section clearfix">
        <div class="vd_panel-header">
            <h1>Dashboard</h1>
            <small class="subtitle">Informações Imediatas sobre o desempenho do negócio</small>
        </div>
    </div>
    <!-- vd_title-section -->

    <div class="vd_content-section clearfix">
        
        
    </div>
    <!-- .vd_content-section -->
    <!-- .vd_content -->
@stop