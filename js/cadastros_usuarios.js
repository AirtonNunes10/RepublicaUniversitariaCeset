$(document).ready(function () {
    $("#areaEstudante").hide();
    $("#areaFuncionario").hide();
    $('#cpf').mask('000.000.000-00', { reverse: true });
    $('#rg').mask('0.000.000');
    $('#cep').mask('00000-000');
    $('#numero').mask('0000');
    $('#dddCelular1').mask('(00)');
    $('#telefoneCelular1').mask('00000-0000');
    $('#dddCelular2').mask('(00)');
    $('#telefoneCelular2').mask('00000-0000');
    $('#dddResidencial').mask('(00)');
    $('#periodo').mask('00');
    $('#telefoneResidencial').mask('0000-0000');

    tabelaEstudantes = $('#tabelaConsultarEstudante').DataTable({
        "responsive": {
            "details": "false"
        },
        "bAutoWidth": "false",
        "lengthMenu": [[5, 10, 15, 20, 25], [5, 10, 15, 20, 25]],
        "pageLength": 5,
        "order": [[0, "asc"]],
        "buttons": [["copy", "csv", "excel", "pdf", "print"]],
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
        "bAutoWidth": "false",
        "lengthMenu": [[5, 10, 15, 20, 25], [5, 10, 15, 20, 25]],
        "pageLength": 5,
        "order": [[0, "asc"]],
        "buttons": [["copy", "csv", "excel", "pdf", "print"]],
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

    tabelaCursos = $('#tabelaConsultarCurso').DataTable({
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
            "url": "caminhoprafazeraconsultaereceberumarraydedadoscomoretorno",
            "type": "POST",
            "data": {
                "key": "sefortervalidacaooualgoassim",
                "action": "pegusdadodocurso"
            }
        }
    });

    $('#tabCadastrarUsuario').tabs({
        activate: function (event, ui) {
        }
    });
    $('#tabConsultarUsuario').tabs({
        activate: function (event, ui) {
        }
    });
    $('#tabConsultarEstudante').tabs({
        activate: function (event, ui) {
            tabelaEstudantes.ajax.reload(null, false);
        }
    });
    $('#tabConsultarFuncionario').tabs({
        activate: function (event, ui) {
            tabelaFuncionarios.ajax.reload(null, false);
        }
    });
    $('#tabCadastrarCurso').tabs({
        activate: function (event, ui) {
        }
    });
    $('#tabConsultarCurso').tabs({
        activate: function (event, ui) {
            tabelaFuncionarios.ajax.reload(null, false);
        }
    });
});

function changeType() {
    var type = $("#tipoUsuario option:selected").val();
    if (type === "admin") {
        $("#action").val("cadastrarEstudante");
        $("#areaEstudante").show();
        $("#areaFuncionario").hide();
    }
    else if (type === "estud") {
        $("#action").val("cadastrarEstudante");
        $("#areaEstudante").show();
        $("#areaFuncionario").hide();
    }
    else if (type === "tesou") {
        $("#action").val("cadastrarEstudante");
        $("#areaEstudante").show();
        $("#areaFuncionario").hide();
    }
    else if (type === "func") {
        $("#action").val("cadastrarFuncionario");
        $("#areaEstudante").hide();
        $("#areaFuncionario").show();
    }
    else {
        $("#action").val("none");
        $("#areaEstudante").hide();
        $("#areaFuncionario").hide();
    }
}