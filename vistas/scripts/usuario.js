var tabla;

function init() {
	mostrarform(false);
	listar();

	$("#formulario").on("submit", function (e) {
		guardaryeditar(e);
	});
	$("#imagenmuestra").hide();

	$('#mPerfil').addClass("treeview active");
	$('#lUsuarios').addClass("active");

	//Cargamos las tiendas
	$.post("../ajax/login.php?op=selectTiendas", function (r) {
		$("#idtienda").html(r);
	});

	$.post("../ajax/usuario.php?op=permisos&id=", function (r) {
		$("#permisos").html(r);
	});

	//Cargamos sexo cbo
	$.post("../ajax/usuario.php?op=selectSexousuario", function (r) {
		$("#sexousuario").html(r);
	});
	//Cargamos PERFIL CLIENTE, EMPLEADO
	$.post("../ajax/usuario.php?op=selectPerfilUsuario", function (r) {
		$("#idperfil").html(r);
	});
}

$('#dniusuario').on('input', function () {
	this.value = this.value.replace(/[^0-9]/g, '');
});
$("#idperfil").change(function () {

	$("select option:selected").each(function () {
		if ($(this).text() == 'Cliente') {
			$('.permisos_div').addClass("ocultar");
		} else {
			$('.permisos_div').removeClass("ocultar");
		}
	});

});

function limpiar() {
	$("#idusuario").val("");
	$("#dniusuario").val("");
	$("#nomusuario").val("");
	$("#sexousuario").val("");
	$("#telusuario").val("");
	$("#emailusuario").val("");
	$("#dirusuario").val("");
	$("#claveusuario").val("");
	$("#imagenusuario").val("");
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
			url: '../ajax/usuario.php?op=listar',
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
		"iDisplayLenght": 25,
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
		url: "../ajax/usuario.php?op=guardaryeditar",
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

function mostrar(idusuario) {
	$.post("../ajax/usuario.php?op=mostrar", {
		idusuario: idusuario
	}, function (data, status) {
		data = JSON.parse(data);
		mostrarform(true);

		$("#idusuario").val(data.idusuario);
		$("#dniusuario").val(data.dniusuario);
		$("#nomusuario").val(data.nomusuario);
		$("#sexousuario").val(data.sexousuario);
		$("#telusuario").val(data.telusuario);
		$("#emailusuario").val(data.emailusuario);
		$("#dirusuario").val(data.dirusuario);
		$("#claveusuario").val(data.claveusuario);
		$("#imagenmuestra").show();
		$("#imagenmuestra").attr("src", "../files/usuarios/" + data.imagenusuario);
		$("#imagenactual").val(data.imagenusuario);

		$("#sexousuario").val(data.sexousuario);
		$('#sexousuario').selectpicker('refresh');

		$("#idtienda").val(data.idtienda);
		$('#idtienda').selectpicker('refresh');

		$("#idperfil").val(data.idperfil);
		$('#idperfil').selectpicker('refresh');
		if (data.idperfil == '5') {
			$('.permisos_div').addClass("ocultar");
		} else {
			$('.permisos_div').removeClass("ocultar");
		}
	})

	$.post("../ajax/usuario.php?op=permisos&id=" + idusuario, function (r) {
		$("#permisos").html(r);
	});
}

function desactivar(idusuario) {
	bootbox.confirm("¿Está Seguro de desactivar el usuario?", function (result) {
		if (result) {
			$.post("../ajax/usuario.php?op=desactivar", {
				idusuario: idusuario
			}, function (e) {
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

function activar(idusuario) {
	bootbox.confirm("¿Está Seguro de activar el usuario?", function (result) {
		if (result) {
			$.post("../ajax/usuario.php?op=activar", {
				idusuario: idusuario
			}, function (e) {
				bootbox.alert(e);
				tabla.ajax.reload();
			});
		}
	})
}

init();