var tabla;

function init() {
	mostrarform(false);
	listar();

	$("#formulario").on("submit", function (e) {
		guardaryeditar(e);
	});

	//Cargamos los datos del usuario
	$.post("../ajax/pedidos.php?op=selectUsuario", function (r) {
		$("#idusuario").html(r);
		$('#idusuario').selectpicker('refresh');

	});
	//Cargamos los datos del usuario
	$.post("../ajax/pedidos.php?op=selectEstado", function (r) {
		$("#idestadopedido").html(r);
		$('#idestadopedido').selectpicker('refresh');

	});

	$('#mGestion').addClass("treeview active");
	$('#lPedidos').addClass("active");

}

function limpiar() {

	$("#idpedido").val("");
	$("#idusuario").val("");
	$("#fechapedido").val("");
	$("#idpedido").val("");
	$("#MonedaPedido").val("");

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
			'copyHtml5',
			'excelHtml5',
			'csvHtml5',
			'pdf'
		],
		"ajax": {
			url: '../ajax/pedidos.php?op=listarpedidos',
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
		url: "../ajax/pedidos.php?op=guardaryeditar",
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

function mostrar(idpedido, cliente) {
	$.post("../ajax/pedidos.php?op=mostrar", {
		idpedido: idpedido,
		cliente: cliente
	}, function (data, status) {
		data = JSON.parse(data);
		mostrarform(true);
		$("#idpedido").val(data.idpedido);
		$("#idusuario").val(data.idusuario);
		$('#idusuario').selectpicker('refresh');
		$("#fechapedido").val(data.fechapedido);
		$("#tipodepago").val(data.tipodepago);
		$("#recojoen").val(data.recojoen);
		$("#pagacon").val(data.pagacon);
		$("#idestadopedido").val(data.idestadopedido);
		$('#idestadopedido').selectpicker('refresh');
		$("#MonedaPedido").val(data.MonedaPedido);
	})
	$.post("../ajax/pedidos.php?op=mostrardetallepedido&id=" + idpedido + "&idcliente=" + cliente, function (r) {
		$("#detalles").html(r);
	});
}

function desactivar(idpedido) {
	bootbox.confirm("¿Está Seguro de desactivar el pedido?", function (result) {
		if (result) {
			$.post("../ajax/pedidos.php?op=desactivar", {
				idpedido: idpedido
			}, function (e) {
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

function activar(idpedido) {
	bootbox.confirm("¿Está Seguro de activar el pedido?", function (result) {
		if (result) {
			$.post("../ajax/pedidos.php?op=activar", {
				idpedido: idpedido
			}, function (e) {
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

init();