/* 	*********************************
		Funciones Android
    ********************************* */
function goOpenAddresses(value) {
    $(location).attr("href", "calculate_delivery.php?idstore=" + value);
}

function goBackFunction(value) {
    $(location).attr("href", "my_account_android.php?idstore=" + value);
}

function guardar_direccion_fun(idstore) {
    var idusuario = document.querySelector("#idusuario_input").value;
    var iddistrito_destino = document.querySelector("#iddistrito_destino_input").value;
    var radios = document.getElementsByName('my_addresses');

    for (var i = 0, length = radios.length; i < length; i++) {
        if (radios[i].checked) {
            // do whatever you want with the checked radio
            guardardireccion(radios[i].value, idstore);
            break;
        }
    }

}

function guardardireccion(value, idstore) {

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
            $(location).attr("href", "../vistas/producto_android.php?idstore=" + idstore);
        },
        error: function () {
            console.log("A ocurrido un error");
        },
    });
}