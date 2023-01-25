/* 	*********************************
		Funciones Android
    ********************************* */
function changePassword(idstore) {
    var claveusuario = document.querySelector("#claveusuario").value;
    var nuevaclave = document.querySelector("#nuevaclaveusuario").value;
    var repitenuevaclave = document.querySelector("#repitenuevaclaveusuario").value;
    if (claveusuario < 6) {
        Android.showToast("La contraseña actual no debe estar vacio");
        console.log("La contraseña actual no debe estar vacio");
    } else if (nuevaclave != repitenuevaclave) {
        Android.showToast("Las contraseñas no son iguales");
        console.log("Las contraseñas no son iguales");
    } else if (nuevaclave.length < 6 || nuevaclave.length < 6) {
        Android.showToast("Debe ingresar minimo 6 caracteres");
        console.log("Debe ingresar minimo 6 caracteres");
    } else {
        changePasswordSave(idstore);
    }


}


function changePasswordSave(idstore) {


    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../ajax/usuario.php?op=changepasswordandroid",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos) {

            Android.showToast(datos);

        }
    });
    //  limpiar();
}