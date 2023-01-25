/* 	*********************************
		Funciones Android
    ********************************* */
document.querySelector('.confirmPurcharse-container2').style.visibility = "hidden";

function confirmar_pedido_recojoencasa_fun() {
    guardaryeditar();
    $(location).attr("href", "confirmarpedido_checkout_android.php");
}


function guardaryeditar() {

    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "../ajax/carritoproducto_android.php?op=listarproductostemporales",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () {
            console.log("enviando producto...");
        },
        success: function (data) {
            console.log("se confirmo el pedido...");
            alert('Se confirmo el pedido con exito');
            Android.showToast('Se confirmo el pedido con exito');
        },
        error: function () {
            console.log("A ocurrido un error");

        },

    });

}

function seguircomprando() {
    $(location).attr("href", "producto_android.php");
}

function eliminarItem(iditem) {

    $.post("../ajax/carritoproducto_android.php?op=eliminaritem", {
        iditem: iditem
    }, function (e) {

        console.log(iditem);

        $("#formulario").load(location.href + " #formulario");

    });
}

var total_shop = document.querySelector('#total_shop').value;
document.querySelector('.spantotal').innerHTML = total_shop;
document.querySelector('.spantotal2').innerHTML = total_shop;