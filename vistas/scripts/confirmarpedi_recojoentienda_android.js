/* 	*********************************
		Funciones Android
    ********************************* */
$("#formulario").load(location.href + " #formulario");

function goBackFunction(value) {
  $(location).attr("href", "select_store_android.php?idstore=" + value);
}

function goBackFunctionSelectStore(value) {
  $(location).attr("href", "my_addresses_add.php?idstore=" + value);
}