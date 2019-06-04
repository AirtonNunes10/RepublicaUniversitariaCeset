/* global toastr */

$(document).ready(function () {
    $(".standardSelect").chosen({
        disable_search_threshold: 10,
        no_results_text: "Sem resultados para:",
        width: "100%"
    });
    carregarCursos();
    $("#areaEstudante").hide();
    $("#areaFuncionario").hide();
    $('#cpf').mask('000.000.000-00', { reverse: true });
    $('#rg').mask('0.000.000');
    $('#cep').mask('00000-000');
    $('#numero').mask('0000');
    $('#celular1').mask('(00)00000-0000');
    $('#celular2').mask('(00)00000-0000');
    $('#telefoneResidencial').mask('(00)0000-0000');
    $('#periodo').mask('00');

    tabelaEstudantes = $('#tabelaConsultarEstudante').DataTable({
        "responsive": {
            "details": "false"
        },
        "dom": 'Blfrtip',
        "buttons": [
            "excel", "pdf", "print"
        ],
        "bAutoWidth": "true",
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
            "url": "estudante_controller.php",
            "type": "POST",
            "data": {
                "key": "sefortervalidacaooualgoassim",
                "action": "consultarEstudantesTable"
            }
        }
    });

    tabelaFuncionarios = $('#tabelaConsultarFuncionario').DataTable({
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
            "url": "estudante_controller.php",
            "type": "POST",
            "data": {
                "key": "sefortervalidacaooualgoassim",
                "action": "consultarFuncionariosTable"
            }
        }
    });


    $('#tabCadastrarUsuario').tabs({
        show: function (_event, ui) {
        }
    });
    $('#tabConsultarUsuario').tabs({
        activate: function (e, ui) {
        }
    });
    $('#consultarUsuario').tabs({
        activate: function (e, ui) {
            tabelaEstudantes.ajax.reload();
            tabelaFuncionarios.ajax.reload();
        }
    });
    $('#consultarEstudante').tabs({
        activate: function (e, ui) {
            tabelaEstudantes.ajax.reload();
        }
    });
    $('#consultarFuncionario').tabs({
        activate: function (e, ui) {
            tabelaFuncionarios.ajax.reload();
        }
    });

});

function changeType() {
    var type = $("#tipoUsuario option:selected").val();
    if (type === "1") {
        $("#action").val("cadastrarEstudante");
        $("#areaEstudante").show();
        $("#areaFuncionario").hide();
    }
    else if (type === "2") {
        $("#action").val("cadastrarEstudante");
        $("#areaEstudante").show();
        $("#areaFuncionario").hide();
    }
    else if (type === "3") {
        $("#action").val("cadastrarFuncionario");
        $("#areaEstudante").hide();
        $("#areaFuncionario").show();
    }
    else if (type === "4") {
        $("#action").val("cadastrarEstudante");
        $("#areaEstudante").show();
        $("#areaFuncionario").hide();
    }
    else {
        $("#action").val("none");
        $("#areaEstudante").hide();
        $("#areaFuncionario").hide();
    }
}

function prepareFormDAta($form) {
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function (n, i) {
        indexed_array[n['name']] = n['value'];
    });

    return JSON.stringify(indexed_array);
}

function salvar() {

    dadosCadastrais = $("#formCadastro").serialize();

    $.ajax({
        url: '../app_university_republic/estudante_controller.php',
        type: 'POST',
        data: {
            action: $("#action").val(),
            user: dadosCadastrais,
            key: "segredo"
        },
        dataType: 'JSON',
        success: function (response) {
            if (response.sucesso === 1) {
                toastr["success"](response.mensagem, "Sucesso!");
                tabelaEstudantes.ajax.reload();
                tabelaFuncionarios.ajax.reload();
            } else {
                toastr["error"](response.mensagem, "Erro!");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
}

function excluirCadastro(id) {
    $.ajax({
        url: '../app_university_republic/estudante_controller.php',
        type: 'POST',
        data: {
            action: "excluirUsuario",
            userID: id,
            key: "segredo"
        },
        dataType: 'JSON',
        success: function (response) {
            if (response.sucesso === 1) {
                alert(response.mensagem);
                tabelaEstudantes.ajax.reload();
                tabelaFuncionarios.ajax.reload();
            } else {
                alert("poxa, deu errado :c");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
}

function carregarCursos() {
    $.ajax({
        url: '../app_university_republic/curso_controller.php',
        type: 'POST',
        data: {
            action: "carregarCursos",
            key: "segredo"
        },
        dataType: 'JSON',
        success: function (response) {
            if (response.sucesso === 1) {
                var cursos = response.cursos;
                for (var i = 0; i < cursos.length; i++) {
                    var option = '<option value="'+cursos[i].id+'">'+ cursos[i].sigla+' - '+cursos[i].curso+'</option>';
                    $("#curso").append(option);
                    $("#curso").trigger('chosen:updated');
                }
            } else {
                alert("poxa, deu errado :c");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }

    });
}