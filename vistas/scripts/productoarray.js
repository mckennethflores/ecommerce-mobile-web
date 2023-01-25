/* 	*********************************
		Funciones Android
    ********************************* */
$(document).ready(function () {
    var list = document.getElementsByClassName("input");
    for (var i = 0; i < list.length; ++i) {
        list[i].value = 1;
    }
    $('.decrementar').prop('disabled', true);
});

function incrementar(variable) {
    var cantidad = 1;
    inputid = parseFloat(document.getElementById('input' + variable).value);
    if (inputid >= 3) {
        $('.incrementar' + variable).prop('disabled', true);
        return;
    }
    cantidad = inputid + 1;
    $('.decrementar' + variable).prop('disabled', false);
    document.getElementById('input' + variable).value = cantidad;
}

function decrementar(variable) {
    var cantidad = 1;
    inputid = parseFloat(document.getElementById('input' + variable).value);
    if (inputid == 1) {
        $('.decrementar' + variable).prop('disabled', true);
        return;
    }
    cantidad = inputid - 1;
    $('.incrementar' + variable).prop('disabled', false);
    document.getElementById('input' + variable).value = cantidad;
}