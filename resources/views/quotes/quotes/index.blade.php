@extends('layout.base')


@section('breadcrumb')
@parent
    <li><a href="{{ url('/')}}">Home</a> </li>
    <li class="active">Manutenção de Cotações</li>
@stop

{{-- Content --}}
@section('content')
    <div class="vd_title-section clearfix">
        <div class="vd_panel-header">
            <h1>Manutenção de Cotações</h1>
            <small class="subtitle">Manutenção e pesquisa de Cotações</small> 
            <div class="vd_panel-menu">
                <a href="{{ route('quotes.create') }}" class="menu">
                    <div> 
                        <span class="menu-icon mgr-10"><i class="fa fa-plus"></i></span>
                        Criar Cotação
                    </div>
                </a>
            </div>
            <div class="vd_panel-menu visible-xs">
                <div class="menu">
                    <div data-action="click-trigger"> 
                        <span class="menu-icon mgr-10">
                            <i class="fa fa-bars"></i>
                        </span>Menu 
                        <i class="fa fa-angle-down"></i> 
                    </div>
                    <div data-action="click-target" class="vd_mega-menu-content width-xs-2 left-xs" style="display: none;">
                        <div class="child-menu">
                            <div class="content-list content-menu">
                                <ul class="list-wrapper pd-lr-10">
                                    <li> 
                                        <a href="{{ route('quotes.create') }}">
                                            <div class="menu-icon"><i class="fa fa-plus"></i></div>
                                            <div class="menu-text">Criar Cotação</div>
                                        </a> 
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="vd_content-section clearfix">
        <div class="panel widget">
            <div class="panel-body">
                <form class="form-horizontal no-check" method="get">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Moeda De:</label>
                                <div class="col-sm-9 controls">
                                    <select id="id_coin" name="id_coin" class="form-control"></select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Moeda Para:</label>
                                <div class="col-sm-9 controls">
                                    <select id="id_coin_conversion" name="id_coin_conversion" class="form-control"></select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Tipo:</label>
                                <div class="col-sm-9 controls">
                                    <select id="type" name="type" class="form-control">
                                        <option value="">Selecione um tipo</option>
                                        <option value="bid">Compra</option>
                                        <option value="ask">Venda</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Periodo:</label>
                                <div class="col-sm-5 controls">
                                    <input required="required" type="text" id="data1" name="data1">
                                </div>
                                <div class="col-sm-4 controls">
                                    <input required="required" type="text" id="data2" name="data2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-offset-1 col-sm-10 btn-form-bottom">
                            <div class="pull-right">
                                <div> 
                                    <button type="button" class="btn vd_btn vd_bg-blue btn-search">
                                        <i class="fa fa-search append-icon"></i> Consultar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="panel widget">
            <div class="panel-body">
                <div class="table-responsive" style="display: none">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Tipo</th>
                                <th>Moeda De</th>
                                <th>Moeda Para</th>
                                <th>Data</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- .vd_content -->
    <input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">
@stop

@section('scripts')
@parent
    <script type="text/javascript">
        window._URLS.quotes_coins_index = "{{ route('coins.index') }}";
        window._URLS.quotes_quotes_index = "{{ route('quotes.index') }}";
    </script>
    <script type="text/javascript" src="{{ asset('modulos/quotes/quotes/index.js') }}"></script>
@stop
