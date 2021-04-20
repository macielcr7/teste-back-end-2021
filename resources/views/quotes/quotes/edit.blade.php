@extends('layout.base')


@section('breadcrumb')
@parent
    <li><a href="{{ url('/')}}">Home</a> </li>
    <li><a href="{{ route('quotes.index')}}">Manutenção de Cotações</a> </li>
    <li class="active">Atualização</li>
@stop

{{-- Content --}}
@section('content')
    <div class="vd_title-section clearfix">
        <div class="vd_panel-header">
            <h1>Atualização de Cotações</h1>
            <small class="subtitle">Formulário para atualização de Cotações</small> 
            <div class="vd_panel-menu">
                <a href="{{ route('quotes.create').'?duplicate='.$data->id }}" class="menu hidden">
                    <div> 
                        <span class="menu-icon mgr-10"><i class="fa fa-paste"></i></span>
                        Duplicar
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="vd_content-section clearfix">
        <div class="panel widget">
            <div class="panel-body">
                <form class="form-horizontal" action="{{ route('quotes.update', $data->id) }}" method="post">
                	<input type="hidden" name="_method" value="put" />
                    @include('quotes.quotes.form')
                </form>
            </div>
        </div>
    </div>
    <!-- .vd_content -->
@stop

