/* 	*********************************
		Funciones Android
    ********************************* */
function goConditionsTerms(value) {
    $(location).attr("href", "conditions_terms.php?idstore=" + value);
}

function goChangePassword(value) {
    $(location).attr("href", "change_password_android.php?idstore=" + value);
}

function goAddresses(value) {
    $(location).attr("href", "my_addresses.php?idstore=" + value);
}

function goHelpPage(value) {
    $(location).attr("href", "help_android.php?idstore=" + value);
}

function goAtentionCustomer(value) {
    $(location).attr("href", "atencionalcliente_android.php?idstore=" + value);
}

function goMyOrders(value) {
    $(location).attr("href", "my_orders.php?idstore=" + value);
}

function goPersonalData(idstore) {
    $(location).attr("href", "my_personal_data.php?idstore=" + idstore);
}

function goOpenActivitySesionLogout() {
    $(location).attr("href", "login_android.php");
   // insertParamInUrl('idusuariosesion', 'cerrarsesion');
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