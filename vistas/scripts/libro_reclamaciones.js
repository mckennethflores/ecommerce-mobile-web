/* 	*********************************
		Funciones Android
    ********************************* */
function init() {

    $.post("../ajax/libro_reclamaciones.php?op=selectTiendas",
        function (values) {
            //    console.log(r);
            $("#idtienda").html(values);
        });
    $.post("../ajax/libro_reclamaciones.php?op=selectDistritos",
        function (values) {
            //    console.log(r);
            $("#iddistrito").html(values);
        });
    $("#formulario").on("submit", function (e) {
        guardar(e);
    });
}

function goBackClaimBook(value) {
    $(location).attr("href", "atencionalcliente_android.php?idstore=" + value);
}
// Te olvidaste poner el parametro
function guardar(e) {

    e.preventDefault();
    //  $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../ajax/libro_reclamaciones.php?op=guardar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos) {
            console.log(datos);
            /* Android.showToast('El reclamo se envio con exito'); */
        }
    });

}
init();