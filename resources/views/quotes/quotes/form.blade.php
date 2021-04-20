<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="col-sm-3 control-label">Moeda De: <span class="vd_red">*</span></label>
            <div class="col-sm-9 controls">
                <select required id="id_coin" name="id_coin" class="form-control">
                    @if(!is_null($data->id_coin) and !empty($data->coinObj))
                        <option selected value="{{ $data->id_coin }}">{{ $data->coinObj->description }}</option>
                    @endif
                </select>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label class="col-sm-3 control-label">Moeda Para: <span class="vd_red">*</span></label>
            <div class="col-sm-9 controls">
                <select required id="id_coin_conversion" name="id_coin_conversion" class="form-control">
                    @if(!is_null($data->id_coin_conversion) and !empty($data->coinConversionObj))
                        <option selected value="{{ $data->id_coin_conversion }}">{{ $data->coinConversionObj->description }}</option>
                    @endif
                </select>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="col-sm-3 control-label">Tipo: <span class="vd_red">*</span></label>
            <div class="col-sm-9 controls">
                <select required id="type" name="type" class="form-control">
                    <option value="">Selecione um tipo</option>
                    <option value="bid" {{ $data->type=='bid' ? 'selected="selected"' : '' }}>Compra</option>
                    <option value="ask" {{ $data->type=='ask' ? 'selected="selected"' : '' }}>Venda</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="col-sm-3 control-label">Valor: <span class="vd_red">*</span></label>
            <div class="col-sm-9 controls">
                <div class="input-group">
                    <input required="required" type="text" id="coin" name="coin" value="{{ $data->coin }}">
                    <span class="input-group-addon vd_bg-blue vd_white vd_bdt-blue" style="cursor: pointer;">
                        <i class="fa fa-search"></i>
                    </span> 
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row btn-form-bottom">
    <div class="col-xs-12">
        <div class="pull-right">
            <div> 
                <span id="valor-cotado">{{ !empty($data->coin_conversion) ? 'Valor Cotado: '.number_format($data->coin_conversion, 2, ',', '.') : '' }}</span>
                <button type="submit" class="btn vd_btn vd_bg-blue btn-sm save-btn">
                    <i class="fa fa-save append-icon"></i> Gravar e Calcular
                </button> 
                <a href="{{ route('quotes.index') }}?back=filtros" class="btn btn-default btn-sm btn-cancel">
                    <i class="fa fa-times append-icon"></i> Cancelar
                </a>
            </div>
        </div>
    </div>
</div>

@section('scripts')
@parent
    <style type="text/css">
        #valor-cotado{
            font-weight: bold;margin-right: 20px;font-size: 1.4em
        }
    </style>
@stop

@section('scripts')
@parent
    <script type="text/javascript">
        window._URLS.quotes_coins_index = "{{ route('coins.index') }}";
    </script>
    <script type="text/javascript" src="{{ asset('modulos/quotes/quotes/form.js') }}"></script>
@stop

