$("#type").select2({
    language: 'pt-BR'
});

$("#id_coin").select2({
    language: 'pt-BR',
    ajax: {
        url: window._URLS.quotes_coins_index,
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                combobox: 1,
                q: params.term,
                page: params.page
            };
        },
        processResults: function (data, params) {
            params.page = params.page || 1;
            return {
                results: data.dados,
                pagination: {
                    more: (params.page * 30) < data.total_count
                }
            };
        }
    },
    placeholder: 'Buscar Moeda',
    escapeMarkup: function (markup) { return markup; },
    minimumInputLength: 0,
    templateResult: function(repo) {
        return repo.loading ? repo.text : repo.description;
    },
    templateSelection: function(repo){
        return repo.description || repo.text;
    }
});

$("#id_coin_conversion").select2({
    language: 'pt-BR',
    ajax: {
        url: window._URLS.quotes_coins_index,
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                combobox: 1,
                id_coin: $("#id_coin").val(),
                conversion: 'S',
                q: params.term,
                page: params.page
            };
        },
        processResults: function (data, params) {
            params.page = params.page || 1;
            return {
                results: data.dados,
                pagination: {
                    more: (params.page * 30) < data.total_count
                }
            };
        }
    },
    placeholder: 'Buscar moeda para conversão',
    escapeMarkup: function (markup) { return markup; },
    minimumInputLength: 0,
    templateResult: function(repo) {
        return repo.loading ? repo.text : repo.description;
    },
    templateSelection: function(repo){
        return repo.description || repo.text;
    }
});

$('#id_coin').on('select2:select', function (e) {
    //var data = e.params.data;
    $('#id_coin_conversion').val(null);
    $('#id_coin_conversion').trigger('change.select2');
});

$('#coin').autoNumeric('init', window.DEFAULT_CURRENCY);

var form_register = $('.form-horizontal');
var params = $.fn.extend(window.DEFAULT_VALIDATOR, {
    submitHandler: function(form) {
        window.CHECK_UNLOAD = true;
        form.submit();
    }
});
form_register.validate(params);