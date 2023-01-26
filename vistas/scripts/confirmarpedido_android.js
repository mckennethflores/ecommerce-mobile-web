/* 	*********************************
		Funciones Android
    ********************************* */
function init() {
  //Oculto los otros dos botones de abajo tienda,casa
  document.querySelector(".confirmPurcharse-container2").style.visibility =
    "hidden";
  sumar();


}

$("#pagacon_cbo").change(mensaje);

function mensaje() {
  var str = "";
  $("#pagacon_cbo option:selected").each(function () {
    str += $(this).text() + "";
  });
  vuelto(str);

  document.querySelector("#pagacon_input").value = str;
}

function vuelto(str) {
  var pagacon = parseFloat(str);
  var total_input = parseFloat(document.querySelector("#total_input").value);
  var vuelt = pagacon - total_input;
  if (vuelt < 0) {
    $(".sms_error").removeClass("ocultar");
  } else {
    $(".sms_error").addClass("ocultar");
  }
  document.querySelector("#vuelto_span").innerHTML = "S/ " + vuelt.toFixed(2);
  document.querySelector("#vuelto_input").value = vuelt.toFixed(2);
}

function changeStore(idstore, idusuario) {
  console.log("demo" + idstore + ": " + idusuario);

  bootbox.confirm({
    title: "Cambiar de Tienda",
    message: "Al cambiar de tienda eliminara los productos agregados anteriormente",
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

}

function deleteproductstempadded(idusuario) {
  $.post("../ajax/producto_android.php?op=deleteproductstempadded", {
      idusuario: idusuario
    })
    .done(function (data) {
      console.log(data);
    });
}

function confirmarCompra(value) {
  var subtotal_input = parseFloat(
    document.querySelector("#subtotal_input").value
  ); //cambio monto z30
  if (subtotal_input > 30) {
    $("span.minimumOrder").css("display", "none");
    document.querySelector("#confirmar_compra").style.visibility = "hidden";

    $("a.iconoRemoverItem").css("display", "none");

    /* $("#contenedor").addClass("ocultar"); */
    /* $(".metododepago").removeClass("ocultar"); */
    //  Habilito los botones de recojo en tienda o recojo en casa
    document.querySelector("#tienda_btn").style.visibility = "visible";
    document.querySelector("#casa_btn").style.visibility = "visible";

    function datosFacturacion_fun() {
      var datosfact_label1 = $("label#datosfact_label1");
      datosfact_label1.click(function () {
        $(this).css("background", "#ff6f00");
        $(this).css("border-bottom-color", "#ff284a");
        $("label#datosfact_label2").css("background", "#73a904");
        $("label#datosfact_label2").css("border-bottom-color", "#557e03");
        $(".container").addClass("ocultar");
        $(".confirmPurcharse-container3").removeClass("ocultar");

        marginBottom("#formulario > div:nth-child(10)", "60");
        $(".confirmPurcharse-container").css("height", "50px");
      });
      var datosfact_label2 = $("label#datosfact_label2");
      datosfact_label2.click(function () {
        $(this).css("background", "#ff6f00");
        $(this).css("border-bottom-color", "#ff284a");
        $("label#datosfact_label1").css("background", "#73a904");
        $("label#datosfact_label1").css("border-bottom-color", "#557e03");
        $(".container").removeClass("ocultar");
        $(".confirmPurcharse-container3").removeClass("ocultar");
        marginBottom("#formulario > div:nth-child(10)", "60");
        $(".confirmPurcharse-container").css("height", "50px");
      });
    }

    var pagoefectivo = $("label#efectivo_div");
    pagoefectivo.click(function () {
      datosFacturacion_fun();
      jQuery("#formulario input[id^=datosfact]:radio").attr("disabled", false);
      $("#formulario label[id^=datosfact_label]").css("background", "#73a904");
      $("#formulario label[id^=datosfact_label]").css(
        "border-bottom",
        "3px solid #557e03"
      );

      $(this).css("background", "#ff6f00");
      $(this).css("border-bottom-color", "#ff284a");

      $("label#tarjeta_div").css("background", "#73a904");
      $("label#tarjeta_div").css("border-bottom-color", "#557e03");
      $(".cancelacon_div").removeClass("ocultar");
      $(".precioPagoEfectivo").removeClass("ocultar");
      $(".vuelto_div").removeClass("ocultar");
      $(".pagacon_cbo").removeClass("ocultar");

      $(".confirmPurcharse-container").css("height", "0px");
    });
    var pagotarjeta = $("label#tarjeta_div");
    pagotarjeta.click(function () {
      datosFacturacion_fun();
      jQuery("#formulario input[id^=datosfact]:radio").attr("disabled", false);
      $("#formulario label[id^=datosfact_label]").css("background", "#73a904");
      $("#formulario label[id^=datosfact_label]").css(
        "border-bottom",
        "3px solid #557e03"
      );
      /*             document.querySelector("#tienda_btn").style.visibility = "visible";
                        document.querySelector("#casa_btn").style.visibility = "visible"; */
      $(this).css("background", "#ff6f00");
      $(this).css("border-bottom-color", "#ff284a");

      $(".cancelacon_div").addClass("ocultar");
      $("label#efectivo_div").css("background", "#73a904");
      $("label#efectivo_div").css("border-bottom-color", "#557e03");
      $(".precioPagoEfectivo").addClass("ocultar");
      $(".vuelto_div").addClass("ocultar");
      $(".pagacon_cbo").addClass("ocultar");

      $(".confirmPurcharse-container").css("height", "0px");
    });
  } else {
    Android.showToast("El pedido debe ser mayor a 30 soles");
    return;
  }
}

function sumar() {
  var delivery_input = parseFloat(
    document.querySelector("#delivery_input").value
  );
  var subtotal = 0;
  var list = document.querySelectorAll(".precioOcultoCalcularJs");

  if (list.length == 0) {
    var message = "No hay productos en el carrito";
    // quitar para produccion
    //Android.showToast(message);
    console.log(message);
    // deshabilito el boton
    $(".btnConfirmPurcharse").prop("disabled", true);
    $(".btnConfirmPurcharse").css("background", "#b4b4b4");
    document.querySelector(".subtotal_span").innerHTML = 0.0;
    document.querySelector(".total_span").innerHTML = 0.0;
  } else {
    var values = [];
    for (var i = 0; i < list.length; ++i) {
      values.push(parseFloat(list[i].value));
    }
    subtotal = values.reduce(function (
      previousValue,
      currentValue,
      index,
      array
    ) {
      return parseFloat(previousValue) + parseFloat(currentValue);
    });
    var subtotal_format = subtotal.toFixed(2);
    document.querySelector(".subtotal_span").innerHTML = subtotal_format;
    document.querySelector("#subtotal_input").value = subtotal_format;

    var total = delivery_input + subtotal;
    console.log(total);
    var total_format = total.toFixed(2);
    document.querySelector(".total_span").innerHTML = total_format;
    document.querySelector("#total_input").value = total_format;
  }
}
$(".iconoRemoverItem").on("click", function (e) {
  e.preventDefault();
  var parent = $(this).parent().attr("id");
  var elemento = $(this).attr("data");

  var dataString = "idproducto=" + elemento;

  $.ajax({
    type: "POST",
    url: "../ajax/carritoproducto_android.php?op=eliminarproducto",
    data: dataString,
    success: function (response) {
      console.log(response);
      $("#" + parent).fadeOut("slow");
      $("#" + parent).remove();

      sumar();
    },
  });
});

function marginBottom(clase, medida) {
  $(clase).css({
    marginBottom: medida + "px",
  });
}

function recojoEnCasa_fun(idstore) {
  jQuery("#formulario input[id^=datosfact]:radio").attr("disabled", true);
  $("#formulario label[id^=datosfact_label]").css(
    "background",
    "rgb(130, 130, 130)"
  );
  $("#formulario label[id^=datosfact_label]").css(
    "border-bottom",
    "3px solid #757575"
  );
  // marginBottom(".metododepago", "60");
  $("#contenedor").addClass("ocultar");
  var delivery = $("#valueHiddenDelivery").val();

  $("#delivery_input").val(delivery);
  $("#delivery_span").html(delivery);

  sumar();

  $(".metododepago").removeClass("ocultar");
  $(".voucher").removeClass("ocultar");
  document.querySelector("#tienda_btn").style.visibility = "hidden";
  document.querySelector("#casa_btn").style.visibility = "hidden";

  document.querySelector("#recojoen").value = "Envio delivery";
  return;
  /* guardaryeditar("casa");

  $(location).attr(
    "href",
    "confirmarpedi_recojoentienda_android.php?idstore=" + idstore
  ); */
}

function recojoEnTienda_fun(idstore) {
  jQuery("#formulario input[id^=datosfact]:radio").attr("disabled", true);
  $("#formulario label[id^=datosfact_label]").css(
    "background",
    "rgb(130, 130, 130)"
  );
  $("#formulario label[id^=datosfact_label]").css(
    "border-bottom",
    "3px solid #757575"
  );
  // marginBottom(".metododepago", "60");
  $("#contenedor").addClass("ocultar");
  $("#delivery_input").val("0.00");
  $("#delivery_span").html("0.00");
  sumar();
  $(".metododepago").removeClass("ocultar");
  $(".voucher").removeClass("ocultar");

  document.querySelector("#tienda_btn").style.visibility = "hidden";
  document.querySelector("#casa_btn").style.visibility = "hidden";

  document.querySelector("#recojoen").value = "Recojo en tienda";
  return;
  /*   $(".element2").css("visibility", "hidden");
    guardaryeditar("tienda");
    $(location).attr(
      "href",
      "confirmarpedi_recojoentienda_android.php?idstore=" + idstore
    ); */
}

function confirmarPedido(idstore) {

  if (idstore) {
    bootbox.confirm({
      title: "Confirmación de compra",
      message: "Esta seguro que desea confirmar la compra",
      buttons: {
        cancel: {
          label: '<i class="fa fa-times"></i> Cancelar'
        },
        confirm: {
          label: '<i class="fa fa-check"></i> Si, Comprar ahora'
        }
      },
      callback: function (result) {

        if (result) {
          guardaryeditar();
          $(location).attr("href", "confirmarpedi_recojoentienda_android.php?idstore=" + idstore);
        }
      }
    });
  }

}

function factura_fun() {
  $(".datosfacturacion").removeClass("ocultar");
  marginBottom(".datosfacturacion", "60");
  marginBottom(".metododepago", "0");
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
      console.log(": " + data);
      /* Android.showToast('Se confirmo el pedido con exito'); */
    },
    error: function () {
      console.log("A ocurrido un error");
    },
  });
}

init();