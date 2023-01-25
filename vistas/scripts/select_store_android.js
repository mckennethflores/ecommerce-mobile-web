/* 	*********************************
		Funciones Android
    ********************************* */
function store_function(idtienda, idusuario) {

    /*  if (idtienda == 329612) {
         var mensaje = 'La tienda seleccionada se encuentra\n en proceso de activación';
         showMessage("clase", "variable", "estado", mensaje);
     } else { */
    document.querySelector("#idstore_input").value = idtienda;
    document.querySelector("#idusuario_input").value = idusuario;
    guardartienda();
    $(location).attr("href", "producto_android.php?idstore=" + idtienda);
    /*   } */
}

function guardartienda() {

    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "../ajax/tiendas.php?op=guardaryeditartemporal",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        beforeSend: function () {
            console.log("enviando producto...");
        },
        success: function (data) {
            console.log(data);
            Android.showToast(data);
        },
        error: function () {
            console.log("A ocurrido un error");

        },
        /* timeout: 1000 */
    });
}