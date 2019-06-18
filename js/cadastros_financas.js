/* global toastr, listaEstudantes*/

listaEstudantes = [];

$('#cpf').mask('000.000.000-00', { reverse: true });
$('#valorPagamento').mask('000.000.000.000.000,00', { reverse: true });
$('#codigoCompra').mask('00000000000');
$('#quantidade').mask('00000000000');
$('#valorCompra').mask('000.000.000.000.000,00', { reverse: true });
$('#valorTotalRecebidoMes').mask('000.000.000.000.000,00', { reverse: true });
$('#valorTotalDespesaMes').mask('000.000.000.000.000,00', { reverse: true });
$('#valorSaldoTotalMes').mask('000.000.000.000.000,00', { reverse: true });
$('#valorTotalRecebidoDt').mask('000.000.000.000.000,00', { reverse: true });
$('#valorTotalDespesaDt').mask('000.000.000.000.000,00', { reverse: true });
$('#valorSaldoTotalDt').mask('000.000.000.000.000,00', { reverse: true });

$(document).ready(function () {

    $(".standardSelect").chosen({
        disable_search_threshold: 2,
        no_results_text: "Sem resultados para:",
        width: "100%"
    });


    $("#tipoPagamento").val("1");
    trocaTipo();

    carregarEstudantesObject();
    
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
            tabelaDespesas.ajax.reload(null, false);
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
                $("#formPagamento").trigger("reset");
            } else {
                toastr["error"](response.mensagem, "Erro!");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
}

function trocaTipo() {
    var type = $("#tipoPagamento option:selected").val();
    if (type === "1") {
        $("#doacao").show();
        $("#financainterna").hide();
    } else {
        $("#doacao").hide();
        $("#financainterna").show();
    }

    $('.required').prop('required', function () {
        return $(this).is(':visible');
    });
}

function carregarEstudantesObject() {
    $.ajax({
        url: '../app_university_republic/estudante_controller.php',
        type: 'POST',
        data: {
            action: "carregarEstudantesOBJ",
            key: "segredo"
        },
        dataType: 'JSON',
        success: function (response) {
            if (response.sucesso === 1) {
                var estudantes = response.estudantes;
                for (var i = 0; i < estudantes.length; i++) {
                    var option = '<option value="' + estudantes[i].idEstudante + '">' + estudantes[i].nome + '</option>';
                    $("#estudante").append(option);
                    $("#estudante").trigger('chosen:updated');
                }
                listaEstudantes = estudantes;
            } else {
                alert("poxa, deu errado :c");
                console.log(response);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }

    });
}

function putCPF() {
    var idEstudante = $("#estudante option:selected").val();
    console.log(idEstudante);
    var estudante = listaEstudantes.find(function (estudante) {
        if (estudante.idEstudante === idEstudante) {
            return estudante;
        }
    });
    $("#cpf").val(estudante.cpf);
    $("#cpf").unmask().mask('000.000.000-00', { reverse: true });
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
                tabelaDespesas.ajax.reload();
                $("#formDespesa").trigger("reset");
            } else {
                toastr["error"](response.mensagem, "Erro!");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
}

function filtrarEntreDatas() {
    var dataInicio = $("#dataInicioSaldo").val();
    var dataFinal = $("#dataFinalSaldo").val();
    if (!dataInicio) {
        toastr["error"]("Por favor, selecione uma data inicial!");
        return;
    }
    if (!dataFinal) {
        toastr["error"]("Por favor, selecione uma data final!");
        return;
    }
    var periodo = {dataInicial: dataInicio, dataFinal: dataFinal};
    $.ajax({
        url: '../app_university_republic/financas_controller.php',
        type: 'POST',
        data: {
            action: "consultarEntreDatas",
            periodo: periodo,
            key: "segredo"
        },
        dataType: 'JSON',
        success: function (response) {
            if (response.sucesso === 1) {
                $("#valorTotalRecebidoDt").val(response.financaInfo.valorTotalRecebido);
                $("#valorTotalDespesaDt").val(response.financaInfo.valorTotalDespesa);
                $("#valorSaldoTotalDt").val(response.financaInfo.valorTotalSaldo);
            } else {
                toastr["error"](response.mensagem, "Erro!");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
}

function consultaSaldoMesAtual() {
    $.ajax({
        url: '../app_university_republic/financas_controller.php',
        type: 'POST',
        data: {
            action: "consultarSaldoMesAtual",
            key: "segredo"
        },
        dataType: 'JSON',
        success: function (response) {
            if (response.sucesso === 1) {
                $("#valorTotalRecebidoMes").val(response.financaInfo.valorTotalRecebido);
                $("#valorTotalDespesaMes").val(response.financaInfo.valorTotalDespesa);
                $("#valorSaldoTotalMes").val(response.financaInfo.valorTotalSaldo);
            } else {
                toastr["error"](response.mensagem, "Erro!");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
}
