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

var incrementProductosOffset = 0;

var idstore = getParamUrl();
getProductos(idstore, incrementProductosOffset);
getProductos(idstore, incrementProductosOffset)
  .then(function (data) {
    return data.json();
  })
  .then((data) => {
    listadoProductos(data);
  });
incrementProductosOffset += 4;
/* LIST PRODUCT FOR STORE */
function getProductos(idstore, incrementProductosOffset) {
  return fetch(
    "../ajax/producto.php?op=listProductsAndroid" +
    "&idstore=" + idstore +
    "&offset=" + incrementProductosOffset +
    "&limit=8"
  );
}
/* ESTA FUNCION CARGA MAS PRODUCTOS CUANDO EL USUARIOS PRESIONA Scrolling CON LOS DEDOS */
$(window).scroll(function () {

  /* Verifica el tamaño de la pantalla */
  if ($(window).scrollTop() >= $(document).height() - $(window).height()) {

    var idstore = getParamUrl();
    getProductos(idstore, incrementProductosOffset);
    getProductos(idstore, incrementProductosOffset)
      .then(function (data) {
        return data.json();
      })
      .then((data) => {
        listadoProductos(data);
      });
    incrementProductosOffset += 4;
  }

});

function goLinea(value) {
  $(location).attr("href", "linea_android.php?idstore=" + value);
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
    }, 500);

    count++;
  });
  console.log("Hay " + count + " productos");
}

/* Listamos todas las categorias con ajax */

getCategoryLine();
getCategoryLine()
  .then(function (data) {
    return data.json();
  })
  .then((data) => {
    listCategoryLine(data);
  });

/* LIST PRODUCT FOR STORE */
function getCategoryLine() {
  return fetch(
    "../ajax/linea_android.php?op=listCategoryLine"
  );
}

/* SHOW CATEGORY LINE JS */
function listCategoryLine(categoryLines) {
  var count = 0;
  categoryLines.forEach((item1, index) => {
    var idstore = getParamUrl();
    var post2 = `<div class="contentImageMainProducts">
    <div class="imageMainProducts"><a href="sublinea_android.php?idstore=${idstore}&idlinea=${item1.idproductolinea}"><img src="../files/${item1.imagen}" alt="">
    <span>${item1.nomproductolinea}</span></a></div>
    </div>`;

    setTimeout(function () {
      $("#contentCategoryMainProducts").append(post2);

    }, 500);

    count++;
  });
  console.log("Hay " + count + " lineas");
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

  //SLIDER
  var mySwiper = new Swiper(".swiper-container", {
    direction: "horizontal",
    autoHeight: true,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
    },
    scrollbar: {
      el: ".swiper-scrollbar",
    },
  });
  // hiddenBoxAlert
});
function hiddenBoxAlert(){
  $( ".boxAlert" ).hide("slow");
/*   $(".content").css("margin-top", "60px"); */
}