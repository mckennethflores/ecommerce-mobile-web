/* 	*********************************
		Funciones Android
    ********************************* */
function goPersonalData(idstore) {
    $(location).attr("href", "my_personal_data_edit.php?idstore=" + idstore);
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

    //this will reload the page, it's likely better to store this until finished
    document.location.search = kvp.join('&');
}