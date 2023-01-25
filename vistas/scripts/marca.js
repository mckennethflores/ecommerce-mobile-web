var tabla;
//Función que se ejecuta al inicio
function init() {
    mostrarform(false);
    listar();

    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    });
    $("#imagenmuestra").hide();

    $('#mAlmacen').addClass("treeview active");
    $('#lMarcas').addClass("active");
}

//Función limpiar
function limpiar() {
    $("#idmarca").val("");
    $("#nombre").val("");
}

//Función mostrar formulario
function mostrarform(flag) {
    limpiar();
    if (flag) {
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled", false);
    } else {
        $("#listadoregistros").show();
        $("#formularioregistros").hide();
        $("#btnagregar").show();
    }
}

//Función cancelarform
function cancelarform() {
    limpiar();
    mostrarform(false);

}

function listar() {
    tabla = $('#tbllistado').dataTable({
        "aProcessing": true, // Ativamos el procesamiento de datables
        "aServerSide": true, //Paginacion y filtrado realizado por el servidor
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdf'
        ],
        "ajax": {
            url: '../ajax/marca.php?op=listar',
            type: "get",
            dataType: "json",
            error: function (e) {
                console.log(e.responseText);
            }

        },
        "language": {
            "lengthMenu": "Mostrar : _MENU_ registros",
            "buttons": {
                "copyTitle": "Tabla Copiada",
                "copySuccess": {
                    _: '%d líneas copiadas',
                    1: '1 línea copiada'
                }
            }
        },
        "bDestroy": true,
        "iDisplayLenght": 5,
        "order": [
            [0, "ASC"]
        ]

    }).DataTable();
}

function mostrar(idmarca) {
    $.post("../ajax/marca.php?op=mostrar", {
        idmarca: idmarca
    }, function (data, status) {
        data = JSON.parse(data);
        mostrarform(true);

        $("#idmarca").val(data.id);
        $("#nombre").val(data.descripcion);
        /*     $("#imagenmuestra").show();
               $("#imagenmuestra").attr("src", "../files/lineas/" + data.imagen);
               $("#imagenactual").val(data.imagen); */
    })
}

// Te olvidaste poner el parametro
function guardaryeditar(e) {

    e.preventDefault();
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../ajax/marca.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos) {
            bootbox.alert(datos);
            mostrarform(false);
            tabla.ajax.reload();
        }
    });
    limpiar();

}
//Función para desactivar registros
function desactivar(idmarca) {
    bootbox.confirm("¿Está Seguro de desactivar marca?", function (result) {
        if (result) {
            $.post("../ajax/marca.php?op=desactivar", {
                idmarca: idmarca
            }, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}
//Función para activar registros
function activar(idmarca) {
    bootbox.confirm("¿Está Seguro de activar la linea?", function (result) {
        if (result) {
            $.post("../ajax/marca.php?op=activar", {
                idmarca: idmarca
            }, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

init();