$( document ).ready( function(){
    $('#cpf').mask('000.000.000-00', {reverse: true});
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
});

function changeType(){
     console.log($("#tipoUsuario").val());
}