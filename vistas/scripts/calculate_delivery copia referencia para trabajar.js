/* 	*********************************
		Funciones Android
    ********************************* */
function init() {
    /* Cuando inicia la pagina carga todos los distritos */
    $.post("../ajax/calculate_delivery.php?op=selectDistritos",
        function (values) {
            //    console.log(r);
            $("#iddistrito").html(values);
        });
    /*    $("#direccion").onkeydown(function () {
           
       }); */
    /* Cuando el input con el id #iddireccion tiene el foco quitar activar el boton  */
    $("#direccion").focus(function () {
        $(".confirmPurcharse-container").removeClass("boton");
    });
}

/* Si el usuario selecciona algun elemento del combobox# iddistrito y las opciones seleccionadasidzona corresponden a los
distritos donde se tiene cobertura entonces activa el combobox que tiene el id# idzona
 */

$("#iddistrito").change(function () {

    var iddistrito = $(this).children("option:selected").val();
    if (iddistrito == '16' || iddistrito == '6' || iddistrito == '24' || iddistrito == '29') {
        console.log(iddistrito);
        $(".iddistrito").addClass("ocultar");
        $(".zona").removeClass("idzona");
    } else {
        console.log("No es igual: " + iddistrito);
        $(".iddistrito").removeClass("ocultar");
        $(".zona").addClass("idzona");
    }
    /*     Obten la data del combobox idzona */
    $.post("../ajax/calculate_delivery.php?op=selectZonas&iddistrito=" + iddistrito,
        function (values) {
            $("#idzona").html(values);
        });
});

/*
 Si seleccionas el combobox con el id idzona remueve la clase iddireccion
 */

$("#idzona").change(function () {

    var idzona = $(this).children("option:selected").val();
    if (idzona) {
        $(".direccion").removeClass("iddireccion");
    }
    /*     obten el precio de acuerdo a la zona que selecciono el usuario */
    $.post("../ajax/calculate_delivery.php?op=selectPrecio&idzona=" + idzona,
        function (values) {

            $('#precio').text(values);
            console.log(values);
            $(".delivery").removeClass("iddelivery");
            $('#predelive_input').val(values);
        });
});

function saveStore(idstore) {

    // var idstore = document.querySelector("#idstore").value;
    var iddistrito = $("#iddistrito option:selected").val();
    var idzona = $("#idzona option:selected").val();
    var direc = document.querySelector("#direccion").value;
    // var mDirec = direc.trim().length;

    $('#iddistrito_input').val(iddistrito);
    $('#idzona_input').val(idzona);
    saveStoreAjax(idstore);
}
/* Guarda el precio de todo lo seleccionado y continua  */
function saveStoreAjax(idstore) {

    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../ajax/calculate_delivery.php?op=guardarprecio",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos) {
            /*             if (datos == '{"error":"yes","message":"nohaycobertura"}') {
                            console.log("no cobertura");
                            //console.log("Open Page No hay cobertura");
                            $(location).attr("href", "../vistas/nohaycobertura.php?idstore=" + idstore);
                        } else {

                            $(location).attr("href", "../vistas/producto_android.php?idstore=" + idstore);
                        } */
            console.log(datos);
            $(location).attr("href", "../vistas/producto_android.php?idstore=" + idstore);
            // Android.showToast("Se ingreso la dirección con exito");

        }
    });
    //  limpiar();

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

$("#mydiv").addClass("disabledbutton");

init();