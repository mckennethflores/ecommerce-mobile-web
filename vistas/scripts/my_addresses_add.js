/* 	*********************************
		Funciones Android
    ********************************* */
function init() {

    $.post("../ajax/myaddressesadd.php?op=selectDistritos", function (r) {
        $("#iddistritos").html(r);

    });
}

function saveStore(idstore) {
    var direc = document.querySelector("#direccion").value;
    var calle = document.querySelector("#calle").value;

    var mDirec = direc.trim().length;
    var mCalle = calle.trim().length;

    if (isEmpty(mDirec)) {
        $('.direccion').removeClass("ocultar");
    } else if (isEmpty(mCalle)) {
        $('.calle').removeClass("ocultar");
    } else {
        guardaryeditar(idstore);
    }

}

function guardaryeditar(idstore) {

    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../ajax/myaddressesadd.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos) {
            if (datos == '{"error":"yes","message":"nohaycobertura"}') {
                console.log("no cobertura");
                //console.log("Open Page No hay cobertura");
                $(location).attr("href", "../vistas/nohaycobertura.php?idstore=" + idstore);
            } else {

                $(location).attr("href", "../vistas/producto_android.php?idstore=" + idstore);
            }
            console.log(datos);
            // Android.showToast("Se ingreso la dirección con exito");

        }
    });
    //  limpiar();

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