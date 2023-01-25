/* 	*********************************
		Funciones Android
    ********************************* */
function comprar_fun(idproducto, precio) {
    /*   Agrego el precio y el idproducto a unos input para luego guardarlos en una tabla temporal */
    document.querySelector("#idproducto_input").value = idproducto;
    document.querySelector("#precio_input").value = precio;
    guardarproducto();
    //verificarProductoAgregado();
}
/* SAVE PRODUCT */
function guardarproducto() {
    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "../ajax/carritoproducto_android.php?op=guardarproductotemporal",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () {
            console.log("enviando producto...");
        },
        success: function (data) {
            console.log(data);

            var objeto = JSON.parse(data);
            if (objeto.message == "productocorrectamenteadded") {
                $(".cart-resume-counter").removeClass("ocultar");
                document.querySelector(
                    "body > div.header-cont > div > div:nth-child(3) > div > span"
                ).innerHTML = objeto.cantidad;

                alertify.set({
                    delay: 1000,
                });
                alertify.success("Producto agregado al carrito");
            } else {
                alertify.set({
                    delay: 1000,
                });
                alertify.success("Ya agregaste este producto");
            }
        },
        error: function () {
            console.log("A ocurrido un error");
        },
    });
}

function thereProductsTempAdded(idstore, idusuario) {
    console.log(idstore, idusuario);
    $.post("../ajax/producto_android.php?op=thereproductstempadded", {
            idusuario: idusuario
        })
        .done(function (data) {
            if (data) {
                bootbox.confirm({
                    title: "Eliminar proudctos agregados",
                    message: "Al cambiar de tienda eliminara los proudctos agregados anteriormente ?.",
                    buttons: {
                        cancel: {
                            label: '<i class="fa fa-times"></i> Cancelar'
                        },
                        confirm: {
                            label: '<i class="fa fa-check"></i> Confirmar'
                        }
                    },
                    callback: function (result) {

                        if (result) {
                            $(location).attr("href", "select_store_android.php?idstore=" + idstore);
                            deleteproductstempadded(idusuario);
                        }
                    }
                });
            } else {
                $(location).attr("href", "select_store_android.php?idstore=" + idstore);
            }
        });
}

function deleteproductstempadded(idusuario) {
    $.post("../ajax/producto_android.php?op=deleteproductstempadded", {
            idusuario: idusuario
        })
        .done(function (data) {
            console.log(data);
        });
}

function buscar_fun(nameproduct, idstore_input) {
    nameproduct = document.querySelector("#nameproduct").value;
    idstore_input = document.querySelector("#idstore_input").value;
    console.log(idstore_input);
    buscarproducto();
}

function buscarproducto() {

    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "../ajax/search_android.php?op=buscar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () {
            console.log("enviando producto...");
        },
        success: function (data) {

            if (data) {
                //Si hay información muestro los productos
                $("#container-product").empty();
                $("#container-product").append(data);
                // console.log("Si hay información muestro los productos");
            } else {
                //Imprimo un mensaje: No se encontro el producto
                $("#container-product").empty();
                console.log("Imprimo un mensaje: No se encontro el producto");
                $("#container-product").append("<p style='color:#ff0000;' >No se encontro el producto</p>");
            }
        },
        error: function () {
            console.log("A ocurrido un error");
        },
        /* timeout: 1000 */
    });
}



/*  ******************* Search *************************** */
var searchBox = document.querySelectorAll('.search-box input[type="text"] + span');

searchBox.forEach(elm => {
    elm.addEventListener('click', () => {
        elm.previousElementSibling.value = '';
    });
});