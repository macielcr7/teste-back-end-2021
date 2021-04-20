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

$("#type").select2({
    language: 'pt-BR'
});

$("#data1, #data2").inputmask("99/99/9999", {removeMaskOnSubmit: false});
$('#data1, #data2').datepicker();

$(".btn-search").click(function(){
    if($('.table-responsive:visible').length==0){
        $('.table-responsive').slideDown();
        $('.table').DataTable({
            "ajax": {
                "ajax": window._URLS.quotes_quotes_index,
                "data": function ( d ) {
                    d.id_coin = $('#id_coin').val();
                    d.id_coin_conversion = $('#id_coin_conversion').val();
                    d.type = $('#type').val();
                    d.data1 = $('#data1').val();
                    d.data2 = $('#data2').val();
                }
            },
            
            "responsive": true,
            "processing": true,
            "serverSide": true,

            "language": {
                "url": window._ROOT_PATH+"plugins/dataTables/Portuguese-Brasil.json"
            },

            "lengthMenu": [[5, 10, 25, 50, 100], [5, 10, 25, 50, 100]],
            "pagingType": "bootstrap",
            "pageLength": 25,

            "order": [[ 4, "desc" ]],
            "columns": [
                { "data": "id" },
                { "data": "type" },
                { "data": "id_coin" },
                { "data": "id_coin_conversion" },
                { "data": "updated_at" },
                { "data": "created_at", className: "menu-action" }
            ],
            "aoColumnDefs":[
                {
                    "aTargets": [ 2 ],
                    "mRender": function ( data, type, full )  {
                        return full.coin.toFixed(2).replace('.', ',')+' '+full.c1_code;
                    }
                },
                {
                    "aTargets": [ 3 ],
                    "mRender": function ( data, type, full )  {
                        return full.coin_conversion.toFixed(2).replace('.', ',')+' '+full.c2_code;
                    }
                },
                {
                    "aTargets": [ 1 ],
                    "mRender": function ( data, type, full )  {
                        if(data=='bid'){
                            return 'Compra';
                        }
                        else {
                            return 'Venda';
                        }
                    }
                },
                {
                    "aTargets": [ 4 ],
                    "mRender": function ( data, type, full )  {
                        return moment(data, 'YYYY-MM-DD HH:mm:ss').format('DD/MM/YYYY HH:mm');
                    }
                },
                {
                    "aTargets": [ 5 ],
                    "bSortable": false,
                    "mRender": function ( data, type, full )  {
                        return  '<a href="'+__URL_BASE+'/quotes/quotes/'+full.id+'/edit" data-original-title="Editar" title="Editar" data-toggle="tooltip" data-placement="top" class="btn menu-icon vd_bd-yellow vd_yellow"> <i class="fa fa-pencil"></i> </a>';
                    }
                }
            ]
        });
        
        var table = $('.table').DataTable();
        table.on( 'draw', function () {
            $('[data-toggle^="tooltip"]').tooltip();
        });
    }
    else{
        var table = $('.table').DataTable();
        table.ajax.reload();
    }

    $('html,body').animate({
        scrollTop: $('.table-responsive').offset().top},
    'slow');
});