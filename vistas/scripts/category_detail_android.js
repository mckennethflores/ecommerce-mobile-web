/* 	*********************************
		Funciones Android
    ********************************* */
function comprar_fun(idproducto, precio) {
    document.querySelector("#idproducto_input").value = idproducto;
    document.querySelector("#precio_input").value = precio;
    guardarproducto();
}



function abrirpagconfirm() {
    $(location).attr("href", "confirmarpedido_android.php");
}

function openMyAccount_func() {
    $(location).attr("href", "my_account_android.php");
}

function openSelectStore() {
    $(location).attr("href", "select_store_android.php");
}

function goSearchFileAndroidFunction() {
    $(location).attr("href", "search_android.php");
}