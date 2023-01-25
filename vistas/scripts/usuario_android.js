/* 	*********************************
		Funciones Android
    ********************************* */
var tabla;

function init() {
	mostrarform(false);

	$("#formulario").on("submit", function (e) {
		guardaryeditar(e);
	});

}

function limpiar() {
	$("#idusuario").val("");
	$("#dniusuario").val("");
	$("#nomusuario").val("");
	$("#sexousuario").val("");
	$("#telusuario").val("");
	$("#emailusuario").val("");

	$("#claveusuario").val("");

}

function mostrarform(flag) {
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
// Te olvidaste poner el parametro
function guardaryeditar(e) {

	e.preventDefault();
	$("#btnGuardar").prop("disabled", true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/usuario.php?op=registrousuarioandroid",
		type: "POST",
		data: formData,
		contentType: false,
		processData: false,

		success: function (datos) {
			console.log("Se registro exitosamente" + datos);
		}
	});
	/* limpiar(); */

}

init();