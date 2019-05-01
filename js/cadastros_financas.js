$(document).ready(function () {

    tabelaPagamentos = $('#tabelaConsultarPagamento').DataTable({
        "responsive": {
            "details": "false"
        },
        "bAutoWidth": "false",
        "lengthMenu": [[5, 10, 15, 20, 25], [5, 10, 15, 20, 25]],
        "pageLength": 5,
        "order": [[0, "asc"]],
        "language": {
            "sInfoEmpty": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_  Resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Procurar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        },
        "ajax": {
           "url": "pagamento_controller.php",
            "type": "POST",
            "data": {
                "key": "sefortervalidacaooualgoassim",
               "action": "consultarPagamentoTable"
            }
        }
    });

    tabelaDespesas = $('#tabelaConsultarDespesa').DataTable({
        "responsive": {
            "details": "false"
        },
        "bAutoWidth": "false",
        "lengthMenu": [[5, 10, 15, 20, 25], [5, 10, 15, 20, 25]],
        "pageLength": 5,
        "order": [[0, "asc"]],
        "language": {
            "sInfoEmpty": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_  Resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Procurar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        },
        "ajax": {
           "url": "despesa_controller.php",
            "type": "POST",
            "data": {
                "key": "sefortervalidacaooualgoassim",
               "action": "consultarDespesaTable"
            }
        }
    });

    tabelaSaldos = $('#tabelaConsultarSaldo').DataTable({
        "responsive": {
            "details": "false"
        },
        "bAutoWidth": "false",
        "lengthMenu": [[5, 10, 15, 20, 25], [5, 10, 15, 20, 25]],
        "pageLength": 5,
        "order": [[0, "asc"]],
        "language": {
            "sInfoEmpty": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_  Resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Procurar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        },
        "ajax": {
           "url": "saldo_controller.php",
            "type": "POST",
            "data": {
                "key": "sefortervalidacaooualgoassim",
               "action": "consultarSaldoTable"
            }
        }
    });
    
    $('#tabPagamento').tabs({
        activate: function (event, ui) {
        }
    });
    $('#tabDespesa').tabs({
        activate: function (event, ui) {
        }
    });
    $('#tabSaldo').tabs({
        activate: function (event, ui) {
        }
    });
    $('#tabCadastrarPagamento').tabs({
        activate: function (event, ui) {
        }
    });
    $('#tabConsultarPagamento').tabs({
        activate: function (event, ui) {
            tabelaPagamentos.ajax.reload(null, false);
        }
    });
    $('#tabCadastrarDespesa').tabs({
        activate: function (event, ui) {
        }
    });
    $('#tabConsultarDespesa').tabs({
        activate: function (event, ui) {
            tabelaDepesas.ajax.reload(null, false);
        }
    });
    $('#tabConsultarSaldo').tabs({
        activate: function (event, ui) {
            tabelaSaldos.ajax.reload(null, false);
        }
    });
});

