/* 	*********************************
		Funciones Android
    ********************************* */
function goConditionTerms(value) {
    $(location).attr("href", "terminos_condiciones.php?idstore=" + value);
}

function goClaimbook(value) {
    $(location).attr("href", "libro_reclamaciones.php?idstore=" + value);
}
libro_reclamaciones.php

function guardar_direccion_fun() {
    var idusuario = document.querySelector("#idusuario_input").value;
    var iddistrito_destino = document.querySelector("#iddistrito_destino_input").value;
    var radios = document.getElementsByName('my_addresses');

    for (var i = 0, length = radios.length; i < length; i++) {
        if (radios[i].checked) {
            // do whatever you want with the checked radio
            guardardireccion(radios[i].value);
            break;
        }
    }

}

function guardardireccion(value) {

    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "../ajax/my_addresses.php?op=guardardireccion&iddirecuser=" + value,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () {},
        success: function (data) {
            console.log(data);
            // Android.showToast("La tienda se selecciono con exito");
        },
        error: function () {
            console.log("A ocurrido un error");
        },
    });
}