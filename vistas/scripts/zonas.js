var tabla;

function init() {
    mostrarform(false);
    listar();

    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    });
    $.post("../ajax/libro_reclamaciones.php?op=selectDistritos",
        function (values) {
            //    console.log(r);
            $("#iddistrito").html(values);
        });

    $('#mGestion').addClass("treeview active");
    $('#lZonas').addClass("active");

}

function limpiar() {

    $("#idzona").val("");
    $("#iddistrito").val("");
    $("#nombre").val("");
    $("#desde").val("");
    $("#hasta").val("");

}

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

function cancelarform() {
    limpiar();
    mostrarform(false);

}

function listar() {
    tabla = $('#tbllistado').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        buttons: [

        ],
        "ajax": {
            url: '../ajax/zonas.php?op=listarzonas',
            type: "get",
            dataType: "json",
            error: function (e) {
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "iDisplayLenght": 5,
        "order": [
            [0, "desc"]
        ]

    }).DataTable();
}
// Te olvidaste poner el parametro
function guardaryeditar(e) {

    e.preventDefault();
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../ajax/zonas.php?op=guardaryeditar",
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

function mostrar(id) {
    $.post("../ajax/zonas.php?op=mostrar", {
        id: id
    }, function (data, status) {
        data = JSON.parse(data);
        mostrarform(true);
        $("#id").val(data.id);
        $("#iddistrito").val(data.iddistrito);
        $('#iddistrito').selectpicker('refresh');
        $("#nombre").val(data.nomzona);
        $("#desde").val(data.desde);
        $("#hasta").val(data.hasta);
    })
}

function desactivar(idzona) {
    bootbox.confirm("¿Está Seguro de desactivar la zona?", function (result) {
        if (result) {
            $.post("../ajax/zonas.php?op=desactivar", {
                idzona: idzona
            }, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

function activar(idzona) {
    bootbox.confirm("¿Está Seguro de activar la zona?", function (result) {
        if (result) {
            $.post("../ajax/zonas.php?op=activar", {
                idzona: idzona
            }, function (e) {
                bootbox.alert(e);
                tabla.ajax.reload();
            });
        }
    })
}

init();