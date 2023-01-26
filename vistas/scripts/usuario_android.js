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

	var dniusuario = document.querySelector("#dniusuario").value;
	var nomusuario = document.querySelector("#nomusuario").value;
	var emailusuario = document.querySelector("#emailusuario").value;
	var claveusuario = document.querySelector("#claveusuario").value;

	if(dniusuario.trim() != "" && nomusuario.trim() != "" && emailusuario.trim() != "" && claveusuario.trim() != "" ){
		//$("#btnGuardar").prop("disabled", true);
		var formData = new FormData($("#formulario")[0]);

		$.ajax({
			url: "../ajax/usuario.php?op=registrousuarioandroid",
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,

			success: function (datos) {
				data = JSON.parse(datos);

				if(data.message == "success"){
					alert("Usuario registrado satisfactoriamente");
				}else if(data.message == "existeusuario"){
					alert("El usuario ya existe en nuestra plataforma");
					
				}else if(data.message == "existeemail" ){
					alert("El email o correo ya existe");
				}
			}
		});
	}else{
		bootbox.alert("Porfavor rellene todos los campos");
	}

	
	/* limpiar(); */

}

init();