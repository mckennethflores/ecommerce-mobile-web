/* 	*********************************
		Funciones Android
    ********************************* */
/* COMPRAR_FUN */
function comprar_fun(idproducto, precio) {
    /*   Agrego el precio y el idproducto a unos input para luego guardarlos en una tabla temporal */
    document.querySelector("#idproducto_input").value = idproducto;
    document.querySelector("#precio_input").value = precio;
    guardarproducto();
    //verificarProductoAgregado();
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
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
    Accedemos a un servicio remoto
    BELOW - GET PARAM URL
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *  */
var idstore = getParameterByName('idstore');
var idsublinea = getParameterByName('idsublinea');

getTituloSubLinea(idstore, idsublinea);
getTituloSubLinea(idstore, idsublinea)
    .then(function (data) {
        return data.json();
    })
    .then((data) => {
        listadoTitulo(data);
    });
/* LIST PRODUCT FOR STORE */
function getTituloSubLinea(idstore, idsublinea) {
    return fetch(
        "../ajax/producto.php?op=listarTituloSubLineaAndroid&idstore=" + idstore + "&idsublinea=" + idsublinea
    );
}
/* SHOW PRODUCTS JS */
function listadoTitulo(titulo) {
    var count = 0;
    titulo.forEach((item, index) => {
        var post2 = `<span>${item.nomproductosublinea}</span>`;
        $("#nomsublinea").append(post2);
        count++;
    });
}

getProductos(idstore, idsublinea);
getProductos(idstore, idsublinea)
    .then(function (data) {
        return data.json();
    })
    .then((data) => {
        listadoProductos(data);
    });
/* LIST PRODUCT FOR STORE */
function getProductos(idstore, idsublinea) {
    return fetch(
        "../ajax/producto.php?op=listarProductosSubLineaAndroid&idstore=" + idstore + "&idsublinea=" + idsublinea
    );
}
/* SHOW PRODUCTS JS */
function listadoProductos(productos) {
    var count = 0;
    productos.forEach((item, index) => {
        var post2 = `<div class="product-unit">
              <div class="image"> <img width="120" src="../files/productos/${item.imagen}"> </div>
              <div class="brand">${item.marca}</div>
              <div class="name">${item.nombrecorto}</div>
              <div class="price-unit">S/ ${item.precioventa} c/u</div>
              <span class="stockPrecio">${item.stock}</span>
              <span class="codigoBarra">${item.codigobarra}</span>
              <div class="indicadoresCantidad">
              <button type="button" class="btn-right decrementar${item.idproducto}" onclick="decrementar('${item.idproducto}')" ><i class="fas fa-minus-circle"></i></button>
              <input type="text" readonly id="input${item.idproducto}" value="1">
              <button type="button" class="btn-left incrementar${item.idproducto}" onclick="incrementar('${item.idproducto}')"><i class="fas fa-plus-circle"></i></button>
              <input type="button" class="comprar_btn" onclick="comprar_fun('${item.idproducto}','${item.precioventa}')" value="Comprar">
              </div></div>`;
        setTimeout(function () {
            $("#container-product").append(post2);

            document.querySelector(".product-loading").style.display = "none";
            document.querySelector(".product-loading2").style.display = "none";
        }, 1000);

        count++;
    });
    console.log("Hay " + count + " productos");
}
//FUNCION QUE SE INICE AL CARGAR LA PAGINA
//VALIDA DIRECCION USUARIO
$(document).ready(function () {
    var idstore = getParamUrl();
    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "../ajax/producto_android.php?op=validadireccion",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        beforeSend: function () {},
        success: function (data) {
            console.log(data);
            if (data == "ejecutar_vista") {
                $(location).attr("href", "../vistas/calculate_delivery.php?idstore=" + idstore);
            }
        },
        error: function () {
            console.log("A ocurrido un error");
        },
    });

    var formData2 = new FormData($("#formulario")[0]);
    $.ajax({
        url: "../ajax/carritoproducto_android.php?op=thereProductsAdded",
        type: "POST",
        data: formData2,
        contentType: false,
        processData: false,
        beforeSend: function () {},
        success: function (data) {
            if (data > 0) {
                $(".cart-resume-counter").removeClass("ocultar");
                document.querySelector(
                    "body > div.header-cont > div > div:nth-child(3) > div > span"
                ).innerHTML = data;
            }
        },
        error: function () {
            console.log("A ocurrido un error");
        },
    });

});