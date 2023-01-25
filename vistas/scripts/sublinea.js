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
	$('#lSublineas').addClass("active");
	//Cargamos los items al select marca	
	$.post("../ajax/linea.php?op=selectLinea", function (r) {
		$("#idlinea").html(r);
		$('#idlinea').selectpicker('refresh');
	});
}

//Función limpiar
function limpiar() {
	$("#idsublinea").val("");
	$("#nombre").val("");
	$("#imagen").val("");
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
	tabla = $('#tbllistado').dataTable(
		{
		"lengthMenu": [ 200, 200, 200, 200, 100],//mostramos el menú de registros a revisar
		"aProcessing": true,//Activamos el procesamiento del datatables
		"aServerSide": true,//Paginación y filtrado realizados por el servidor
		dom: '<Bl<f>rtip>',//Definimos los elementos del control de tabla
		buttons: [		          
					'copyHtml5',
					'excelHtml5',
					'csvHtml5',
					'pdf'
				],
		"ajax": {
			url: '../ajax/sublinea.php?op=listar',
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
		"iDisplayLenght": 100,
		"order": [
			[0, "desc"]
		]

	}).DataTable();
}

function mostrar(idsublinea) {
	$.post("../ajax/sublinea.php?op=mostrar", {
		idsublinea: idsublinea
	}, function (data, status) {
		data = JSON.parse(data);
		mostrarform(true);

		$("#idsublinea").val(data.idproductosublinea);
		$("#idlinea").val(data.idproductolinea);
		$('#idlinea').selectpicker('refresh');
		$("#nombre").val(data.nomproductosublinea);
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src", "../files/sublineas/" + data.imagenproductosublinea);
		$("#imagenactual").val(data.imagenproductosublinea);
	})

}
// Te olvidaste poner el parametro
function guardaryeditar(e) {

	e.preventDefault();
	$("#btnGuardar").prop("disabled", true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/sublinea.php?op=guardaryeditar",
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
function desactivar(idsublinea) {
	bootbox.confirm("¿Está Seguro de desactivar la Categoría?", function (result) {
		if (result) {
			$.post("../ajax/sublinea.php?op=desactivar", {
				idsublinea: idsublinea
			}, function (e) {
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

//Función para activar registros
function activar(idsublinea) {
	bootbox.confirm("¿Está Seguro de activar ?", function (result) {
		if (result) {
			$.post("../ajax/sublinea.php?op=activar", {
				idsublinea: idsublinea
			}, function (e) {
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

init();