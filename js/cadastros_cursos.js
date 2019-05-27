/* global toastr */

$(document).ready(function () {
 
    tabelaCursos = $('#tabelaConsultarCurso').DataTable({
         "responsive": {
             "details": "false"
         },
         "dom": 'Bfrtip',
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
            "url": "curso_controller.php",
             "type": "POST",
             "data": {
                 "key": "sefortervalidacaooualgoassim",
                "action": "consultarCursoTable"
             }
         }
     });
 
     $('#tabCadastrarCurso').tabs({
        show: function (_event, ui) {
        }
    });
    $('#tabConsultarCurso').tabs({
        activate: function (e, ui) {
        }
    });
    $('#consultarCurso').tabs({
        activate: function (e, ui) {
            tabelaCursos.ajax.reload();
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

function salvar() {
    var prepareData = prepareFormDAta($("#formCadastro"));

    var dadosCadastraisObject = JSON.parse(prepareData);

    dadosCadastrais = JSON.stringify(dadosCadastraisObject);

    $.ajax({
        url: '../app_university_republic/curso_controller.php',
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
                tabelaCursos.ajax.reload();
            } else {
                toastr["error"](response.mensagem, "Erro!");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }
    });
}
 