function getIdInput(idinput) {
    document.querySelector(idinput).value;
}

function goBack() {
    window.history.back();
}

function getIdValue(variable, tipodedato) {
    if (tipodedato = 'parse_float') {
        return parseFloat(document.getElementById('input' + variable).value);

    } else {
        return document.getElementById('input' + variable).value;
    }

}
/* Valida si un input esta vacio */
function isEmpty(str) {
    return (!str || 0 === str.length);
}

function showMessage(clase, variable, estado, mensaje) {
    $(clase + variable).prop('disabled', estado);
    Android.showToast(mensaje);
    console.log(mensaje);
}
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 

Funcion para incrementar y decrementar el item del producto 
alerta: esta funcion utiliza la funcion de getIdValue() y la funcion showMessage

* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *  */
function incrementar(variable) {
    var cantidad = 1;
    inputid = getIdValue(variable, 'parse_float');
    if (inputid >= 6) {
        showMessage('.incrementar', variable, true, 'Solo se permiten elegir hasta 6 Articulos');
        return;
    }
    cantidad = inputid + 1;
    $('.decrementar' + variable).prop('disabled', false);
    document.getElementById('input' + variable).value = cantidad;
    document.getElementById('cantidad_input').value = cantidad;
}

function decrementar(variable) {
    var cantidad = 1;
    inputid = getIdValue(variable, 'parse_float');
    if (inputid == 1) {
        showMessage('.decrementar', variable, true, 'Como minimo puede elegir 1 Articulo');
        return;
    }
    cantidad = inputid - 1;
    $('.incrementar' + variable).prop('disabled', false);
    document.getElementById('input' + variable).value = cantidad;
    document.getElementById('cantidad_input').value = cantidad;
}
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 

Funciones de vistas/producto_android.php para abrir nuevos archivos o redirigir

* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *  */
function abrirpagconfirm(value) {
    $(location).attr("href", "confirmarpedido_android.php?idstore=" + value);
}

function openMyAccount_func(value) {
    $(location).attr("href", "my_account_android.php?idstore=" + value);
}

function openSelectStore(value) {
    $(location).attr("href", "select_store_android.php?idstore=" + value);
}

function goSearchFileAndroidFunction(value) {
    $(location).attr("href", "search_android.php?idstore=" + value);
}

function goBackFunction(value) {
    $(location).attr("href", "producto_android.php?idstore=" + value);
}

function goCategoryFileAndroidFunction(value) {
    $(location).attr("href", "linea_android.php?idstore=" + value);
}

function getParamUrl() {
    var parts = window.location.search.substr(1).split("&");
    var $_GET = {};
    for (var i = 0; i < parts.length; i++) {
        var temp = parts[i].split("=");
        $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
    }
    return $_GET["idstore"];
}

// Funcion que obtiene los parametros url
let getParameterByName = function () {
    let queries = location.search.substring(1).split('&'),
        processed = {};
    for (let query of queries) {
        let [name, value] = query.split('=');
        processed[decodeURIComponent(name)] = value ? decodeURIComponent(value) : '';
    }

    return function (name) {
        if (typeof processed[name] !== 'undefined')
            return processed[name];
        else
            return null;
    };
}();