/* global toastr */

$('#cpf').mask('000.000.000-00', { reverse: true });
$('#valorPagamento').mask('000.000.000.000.000,00', { reverse: true });
$('#valorCompra').mask('000.000.000.000.000,00', { reverse: true });
$('#codigoCompra').mask('00000000000');
$('#quantidade').mask('00000000000');

$(document).ready(function () {

    tabelaPagamentos = $('#tabelaConsultarPagamento').DataTable({
        "responsive": {
            "details": "false"
        },
        "dom": 'Blfrtip',
        "buttons": [
            "excel", "pdf", "print"
        ],
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
            "url": "financas_controller.php",
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
        "dom": 'Blfrtip',
        "buttons": [
            "excel", "pdf", "print"
        ],
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
            "url": "financas_controller.php",
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
        "dom": 'Bflrtip',
        "buttons": [
            "excel", "pdf", "print"
        ],
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
            "url": "financas_controller.php",
            "type": "POST",
            "data": {
                "key": "sefortervalidacaooualgoassim",
                "action": "consultarSaldoTable"
            }
        }
    });

    $('#tabPagamento').tabs({
        show: function (_event, ui) {
        }
    });
    $('#tabDespesa').tabs({
        show: function (_event, ui) {
        }
    });
    $('#tabSaldo').tabs({
        show: function (_event, ui) {
        }
    });
    $('#tabCadastrarPagamento').tabs({
        show: function (_event, ui) {
        }
    });
    $('#tabConsultarPagamento').tabs({
        activate: function (e, ui) {
            tabelaPagamentos.ajax.reload(null, false);
        }
    });
    $('#tabCadastrarDespesa').tabs({
        show: function (_event, ui) {
        }
    });
    $('#tabConsultarDespesa').tabs({
        activate: function (e, ui) {
            tabelaDepesas.ajax.reload(null, false);
        }
    });
    $('#tabConsultarSaldo').tabs({
        activate: function (e, ui) {
            tabelaSaldos.ajax.reload(null, false);
        }
    });
});

function prepareFormDAta($form) {
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function (n, i) {
        indexed_array[n['name']] = n['value'];
    });

    return JSON.stringify(indexed_array);
}

function salvarPagamento() {
    var prepareData = prepareFormDAta($("#formPagamento"));

    var dadosCadastraisObject = JSON.parse(prepareData);

    dadosCadastrais = JSON.stringify(dadosCadastraisObject);

    $.ajax({
        url: '../app_university_republic/financas_controller.php',
        type: 'POST',
        data: {
            action: "cadastrarPagamento",
            pagamento: dadosCadastrais,
            key: "segredo"
        },
        dataType: 'JSON',
        success: function (response) {
            if (response.sucesso === 1) {
                toastr["success"](response.mensagem, "Sucesso!");
                tabelaPagamentos.ajax.reload();
            } else {
                toastr["error"](response.mensagem, "Erro!");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
}

function salvarDespesa() {
    var prepareData = prepareFormDAta($("#formDespesa"));

    var dadosCadastraisObject = JSON.parse(prepareData);

    dadosCadastrais = JSON.stringify(dadosCadastraisObject);

    $.ajax({
        url: '../app_university_republic/financas_controller.php',
        type: 'POST',
        data: {
            action: "cadastrarDespesa",
            despesa: dadosCadastrais,
            key: "segredo"
        },
        dataType: 'JSON',
        success: function (response) {
            if (response.sucesso === 1) {
                toastr["success"](response.mensagem, "Sucesso!");
                tabelaDepesas.ajax.reload();
            } else {
                toastr["error"](response.mensagem, "Erro!");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
}
