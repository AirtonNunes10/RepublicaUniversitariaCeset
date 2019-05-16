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
        activate: function (event, ui) {
        }
    });

    $('#tabConsultarCurso').tabs({
        activate: function (event, ui) {
            tabelaCursos.ajax.reload(null, false);
        }
    });
});
