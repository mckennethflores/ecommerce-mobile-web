  /* 	*********************************
		Funciones Android
    ********************************* */
  function store_function(idusuario, idstore) {

      /*  if (idstore == 329612) {
           var mensaje = 'La tienda seleccionada se encuentra\n en proceso de activación';
           showMessage("clase", "variable", "estado", mensaje);
       } else { */
      document.querySelector("#idusuario_input").value = idusuario;
      document.querySelector("#idstore_input").value = idstore;
      guardartienda();
      $(location).attr("href", "../vistas/producto_android.php?idstore=" + idstore);
      /*  } */
  }

  function guardartienda() {

      var formData = new FormData($("#formulario")[0]);
      $.ajax({
          url: "../ajax/tiendas.php?op=guardaryeditartemporal",
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          success: function (data) {

              showMessage("clase", "variable", "estado", data);
          },
          error: function () {
              console.log("A ocurrido un error");

          },
          /* timeout: 1000 */
      });
  }
  var modal = $("#cerrar");
  modal.click(function () {
      $(".modal-backdrop").addClass("hidden");
      $("#modal").addClass("hidden");
  });

  const guardar_btn = document.querySelector("#guardar_btn");
  guardar_btn.addEventListener("click", validateFields);

  function validateFields() {
      var prefijo_tienda_input = document.querySelector("#prefijo_tienda_input").value;
      var codigo_tienda_input = document.querySelector("#codigo_tienda_input").value;
      var nombres_input = document.querySelector("#nombres_input").value;
      var dni_input = document.querySelector("#dni_input").value;
      var telefono_input = document.querySelector("#telefono_input").value;
      //validacion de codigo
      saveParticipant();
      // validacion normal
      /*    if (prefijo_tienda_input == '' || prefijo_tienda_input != "B204") {
            $(".span_prefijo").addClass("error");
            $(".span_prefijo").removeClass("hidden");
        } else if (codigo_tienda_input == '') {
            $(".span_prefijo").removeClass("error");
            $(".span_prefijo").addClass("hidden");
            $(".span_codigo").addClass("error");
            $(".span_codigo").removeClass("hidden");
        } else if (nombres_input == '') {
            $(".span_codigo").addClass("hidden");
            $(".span_codigo").removeClass("error");
            $(".span_nombres").addClass("error");
            $(".span_nombres").removeClass("hidden");
        } else if (dni_input == '') {
            $(".span_nombres").addClass("hidden");
            $(".span_nombres").removeClass("error");
            $(".span_dni").addClass("error");
            $(".span_dni").removeClass("hidden");
        } else if (telefono_input == '') {
            $(".span_dni").addClass("hidden");
            $(".span_dni").removeClass("error");
            $(".span_telefono").addClass("error");
            $(".span_telefono").removeClass("hidden");
        } else {
            $(".span_telefono").addClass("hidden");
            $(".span_telefono").removeClass("error");
            saveParticipant();
        }
         if (
            prefijo_tienda_input != "B204" ||
            prefijo_tienda_input != "F104" ||
            prefijo_tienda_input != "F304" ||
            prefijo_tienda_input != "B304" ||
            prefijo_tienda_input != "B205" ||
            prefijo_tienda_input != "F105" ||
            prefijo_tienda_input != "F305" ||
            prefijo_tienda_input != "B305" ||
            prefijo_tienda_input != "B206" ||
            prefijo_tienda_input != "F106" ||
            prefijo_tienda_input != "F306" ||
            prefijo_tienda_input != "B306" ||
            prefijo_tienda_input != "B210" ||
            prefijo_tienda_input != "F110" ||
            prefijo_tienda_input != "F310" ||
            prefijo_tienda_input != "B310" ||
            prefijo_tienda_input != "B209" ||
            prefijo_tienda_input != "F109" ||
            prefijo_tienda_input != "F309" ||
            prefijo_tienda_input != "B309" ||
            prefijo_tienda_input != "B213" ||
            prefijo_tienda_input != "F313" ||
            prefijo_tienda_input != "B313" ||
            prefijo_tienda_input != "F113" ||
            prefijo_tienda_input != "B207" ||
            prefijo_tienda_input != "F107" ||
            prefijo_tienda_input != "F307" ||
            prefijo_tienda_input != "B307" ||
            prefijo_tienda_input != "B211" ||
            prefijo_tienda_input != "F311" ||
            prefijo_tienda_input != "F111" ||
            prefijo_tienda_input != "B311" ||
            prefijo_tienda_input != "B302" ||
            prefijo_tienda_input != "F302" ||
            prefijo_tienda_input != "F102" ||
            prefijo_tienda_input != "B202" ||
            prefijo_tienda_input != "B203" ||
            prefijo_tienda_input != "F303" ||
            prefijo_tienda_input != "B303" ||
            prefijo_tienda_input != "F103"
          ) {
            $(".span_prefijo").addClass("error");
            $(".span_prefijo").removeClass("hidden");
          } else if (nombres_input != "" || nombres_input != null) {
            $(".span_nombres").addClass("hidden");
          } else {
            $(".span_prefijo").addClass("hidden");
            $(".span_prefijo").removeClass("error");
            console.log("La contraseña correcta");
          }
          console.log(prefijo_tienda_input);
          */
      //
  }

  function saveParticipant() {
      var formData = new FormData($("#formulario")[0]);
      $.ajax({
          url: "../ajax/usuario.php?op=saveparticipantraffle",
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          beforeSend: function () {
              console.log("Guardando...");
          },
          success: function (data) {
              $("#modal").addClass("hidden");
              $(".modal-backdrop").addClass("hidden");
              showMessage("clase", "variable", "estado", data);
          },
          error: function () {
              console.log("A ocurrido un error");
          },
      });
  }
  ;