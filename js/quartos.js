/* global toastr */

$(document).ready(function () {
    carregarQuartos();
});

function carregarQuartos(){
    $.ajax({
        url: '../app_university_republic/quarto_controller.php',
        type: 'POST',
        data: {
            action: "carregarQuartos",
            key: "segredo"
        },
        dataType: 'JSON',
        success: function (response) {
            if (response.sucesso === 1) {
                var quartos = response.quartos;
                for (var i = 0; i < quartos.length; i++) {
                    var option = '<option value="' + quartos[i].id + '">' + quartos[i].nome + '</option>';
                    $("#quarto").append(option);
                    $("#quarto").trigger('chosen:updated');
                }
            } else {
                toastr['error']("poxa, deu errado :c", 'tamtamtam');
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(errorThrown);
        }

    });
}