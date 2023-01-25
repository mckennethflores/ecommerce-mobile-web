/* 	*********************************
		Funciones Android
    ********************************* */

function init() {


    $("#formulario").on("submit", function (e) {
        updatePerfilUser(e);
    });

}

function updatePerfilUser(e) {

    e.preventDefault();
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../ajax/usuario.php?op=updateuserandroid",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos) {
            //Android.showToast(datos);

            alert("Datos Actualizados Correctamente");
            
           // alertify.success("datos");
           // console.log("Result: " + datos);
        }
    });
    //limpiar();

}

function goConditionsTerms(value) {
    $(location).attr("href", "conditions_terms.php?idstore=" + value);
}

function goChangePassword(value) {
    $(location).attr("href", "change_password_android.php?idstore=" + value);
}

function goOpenActivitySesionLogout() {
    $(location).attr("href", "my_account_android.php?");

    insertParamInUrl('idusuariosesion', 'cerrarsesion');
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

    document.location.search = kvp.join('&');
}

init();