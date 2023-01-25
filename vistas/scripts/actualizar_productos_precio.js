var tabla;

function init() {
    mostrarform(false);
    listar();



    $("#mAlmacen").addClass("treeview active");
    $("#lActualizarProductosPrecio").addClass("active");

    $("#imagenmuestra1").hide();
    $("#imagenmuestra2").hide();
}

function limpiar() {
    $("#idlinea").val("");
    $("#imagen").val("");
    $("#imagenactual1").val("");
    $("#imagenmuestra1").val("");
    $("#idlinea").selectpicker("refresh");
    $("#idproducto").val("");
    $("#idproductosublinea").val("");
    $("#idunidadmedida").val("");
    $("#codproducto").val("");
    $("#nomproducto").val("");
    $("#nomproductocorto").val("");
    $("#codigobarra").val("");
    $("#Imagen").val("");
    $("#ImagenGrande").val("");
    $("#idproductoestado").val("");
    $("#idanexo_proveedor").val("");
    /*   $("#valorventa").val(""); */
    /* $("#observacion").val(""); */
    $("#idmarca").val("");
    /* $("#preciopromocion").val("");
    $("#stock").val(""); */
    $("#idunidadmedida").selectpicker("refresh");
}

function mostrarform(flag) {
    limpiar();
    if (flag) {
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled", false);
    } else {
        $("#listadoregistros").show();
        $("#formularioregistros").show();
        $("#btnagregar").show();
    }
}

function cancelarform() {
    limpiar();
    mostrarform(false);
}

function listar() {
    tabla = $("#tbllistado")
        .dataTable({
            lengthMenu: [200, 200, 200, 200, 100], //mostramos el menú de registros a revisar
            aProcessing: true, //Activamos el procesamiento del datatables
            aServerSide: true, //Paginación y filtrado realizados por el servidor
            dom: "<Bl<f>rtip>", //Definimos los elementos del control de tabla
            buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
            ajax: {
                url: "../ajax/producto.php?op=listar",
                type: "get",
                dataType: "json",
                error: function (e) {
                    console.log(e.responseText);
                },
            },
            language: {
                lengthMenu: "Mostrar : _MENU_ registros",
                buttons: {
                    copyTitle: "Tabla Copiada",
                    copySuccess: {
                        _: "%d líneas copiadas",
                        1: "1 línea copiada",
                    },
                },
            },
            bDestroy: true,
            iDisplayLenght: 100,
            order: [
                [0, "desc"]
            ],
        })
        .DataTable();
}
// Te olvidaste poner el parametro
function guardaryeditar(e) {
    e.preventDefault();
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../ajax/producto.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos) {
            bootbox.alert(datos);
            mostrarform(false);
            tabla.ajax.reload();
        },
    });
    limpiar();
}

function mostrar(idproducto) {
    $.post(
        "../ajax/producto.php?op=mostrar", {
            idproducto: idproducto,
        },
        function (data, status) {
            data = JSON.parse(data);
            mostrarform(true);

            $("#idproducto").val(data.idproducto);

            $("#idlinea").val(data.idproductolinea);
            $("#idlinea").selectpicker("refresh");

            $("#idproductosublinea").val(data.idproductosublinea);
            $("#idproductosublinea").selectpicker("refresh");
            $("#idunidadmedida").val(data.idunidadmedida);
            $("#idunidadmedida").selectpicker("refresh");
            $("#codproducto").val(data.codproducto);
            $("#nomproducto").val(data.nomproducto);
            $("#nomproductocorto").val(data.nomproductocorto);
            $("#codigobarra").val(data.codigobarra);
            $("#imagenmuestra1").show();
            /* $("#imagenmuestra1").attr("src", data.imagen); */
            $("#imagenmuestra1").attr("src", "../files/productos/" + data.imagen);
            $("#imagenactual1").val(data.imagen);
            $("#imagenmuestra2").show();
            /* $("#imageniuestra2").attr("src", data.imagengrande); */
            $("#imagenmuestra2").attr("src", "../files/productos/" + data.imagen);
            $("#imagenactual2").val(data.imagengrande);
            $("#idproductoestado").val(data.idproductoestado);
            $("#idproductoestado").selectpicker("refresh");
            $("#idanexo_proveedor").val(data.idanexo_proveedor);
            $("#idanexo_proveedor").selectpicker("refresh");
            /* $("#valorventa").val(data.valorventa); */
            $("#observacion").val(data.observacion);
            $("#preciopromocion").val(data.preciopromocion);
            $("#stock").val(data.stock);
            $("#idproducto").val(data.idproducto);
            $("#idproductosublinea").val(data.idproductosublinea);
            $("#idproductosublinea").selectpicker("refresh");
            $("#idmarca").val(data.idmarca);
            $("#idmarca").selectpicker("refresh");
        }
    );
    /* 		$.post("../ajax/productodetalle.php?op=mostrar",{idproducto : idproducto}, function (data, status)
    		{
    			 
    			var data = $.parseJSON(data);
    			$("#stock").val(data.stock);
    		}); */
}

function desactivar(idproducto) {
    bootbox.confirm("¿Está Seguro de desactivar el producto?", function (result) {
        if (result) {
            $.post(
                "../ajax/producto.php?op=desactivar", {
                    idproducto: idproducto,
                },
                function (e) {
                    bootbox.alert(e);
                    tabla.ajax.reload();
                }
            );
        }
    });
}

function activar(idproducto) {
    bootbox.confirm("¿Está Seguro de activar el producto?", function (result) {
        if (result) {
            $.post(
                "../ajax/producto.php?op=activar", {
                    idproducto: idproducto,
                },
                function (e) {
                    bootbox.alert(e);
                    tabla.ajax.reload();
                }
            );
        }
    });
}

init();