function init() {

    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    });

}
function goOpenActivityBackToLoginPage() {
    $(location).attr("href", "passwordrecovery_android.php?");
    insertParamInUrl('backto', 'loginpage');
}
function limpiar() {
    $("#emailusuario").val("");
}
// Te olvidaste poner el parametro
function guardaryeditar(e) {

    e.preventDefault();
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../ajax/passwordrecovery.php?op=verifyemail",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos) {
            var objeto = JSON.parse(datos);
            if (objeto.message == 'success') {
                console.log('Email correcto');


                $(".message-error").addClass("ocultar");
                $(location).attr("href", "passwordrecovery_activation_android.php");

            } else {
                console.log('El email ingresado no pertenece a ninguna cuenta.');
                $(".message-error").removeClass("ocultar");
            }
        }
    });
    limpiar();

}

function insertParamInUrl(key, value) {
    key = encodeURI(key);
    value = encodeURI(value);
    var kvp = document.location.search.substr(1).split('&');
    var i = kvp.length;
    var x;
    while (i--) {
        x = kvp[i].split('=');
        if (x[0] == key) {
            x[1] = value;
            kvp[i] = x.join('=');
            break;
        }
    }

    if (i < 0) {
        kvp[kvp.length] = [key, value].join('=');
    }
    document.location.search = kvp.join('');
}

init();