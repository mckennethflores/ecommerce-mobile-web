function init() {

    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    });

}

function goToPasswordRecovery() {
    $(location).attr("href", "passwordrecovery_android.php");
}
function limpiar() {
    $("#tokenusuario").val("");
}
// Te olvidaste poner el parametro
function guardaryeditar(e) {

    e.preventDefault();
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../ajax/passwordrecovery_activation.php?op=verifycode",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos) {
            var objeto = JSON.parse(datos);
            if (objeto.message == 'success') {
                console.log('Codigo correcto');
                $(location).attr("href", "passwordrecovery_reset_android.php");
            } else {
                Android.showToast("El codigo ingresado es incorrecto");
                console.log('El codigo ingresado es incorrecto.');
                //  $(".message-success").addClass("ocultar");
            }
        }
    });
    limpiar();

}


init();