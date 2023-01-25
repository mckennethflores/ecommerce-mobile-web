function init() {

    $("#formulario").on("submit", function (e) {
        guardaryeditar(e);
    });

}

/* function resetpass_btn() {
    var claveusuario = document.querySelector("#claveusuario").value;
    var rclaveusuario = document.querySelector("#rclaveusuario").value;
    if (claveusuario < 6) {
         Android.showToast("La contraseña actual no debe estar en blanco");  
console.log("La contraseña actual no debe estar en blanco");
}
else if (claveusuario != rclaveusuario) {
     Android.showToast("Las contraseñas no son iguales"); 
    console.log("Las contraseñas no son iguales");
} else if (claveusuario.length < 6 || rclaveusuario.length < 6) {
     Android.showToast("Debe ingresar minimo 6 caracteres"); 
    console.log("Debe ingresar minimo 6 caracteres");
} else {
    resetpass();
}
}*/

function limpiar() {
    $("#claveusuario").val("");
    $("#rclaveusuario").val("");
}

function goToPasswordRecoveryActivation() {
    $(location).attr("href", "passwordrecovery_activation_android.php");
}
function guardaryeditar(e) {

    e.preventDefault();
    var formData = new FormData($("#formulario")[0]);

    var claveusuario = document.querySelector("#claveusuario").value;
    var rclaveusuario = document.querySelector("#rclaveusuario").value;
    if (claveusuario < 6) {
        Android.showToast("La contraseña actual no debe estar en blanco");
        console.log("La contraseña actual no debe estar en blanco");
    } else if (claveusuario != rclaveusuario) {
        Android.showToast("Las contraseñas no son iguales");
        console.log("Las contraseñas no son iguales");
    } else if (claveusuario.length < 6 || rclaveusuario.length < 6) {
        Android.showToast("Debe ingresar minimo 6 caracteres");
        console.log("Debe ingresar minimo 6 caracteres");
    } else {
        $.ajax({
            url: "../ajax/passwordrecovery_reset.php?op=resetpass",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,

            success: function (datos) {
                Android.showToast(datos);
                $(location).attr("href", "passwordrecovery_reset_android.php?backto=loginpage");
                console.log(datos);
            }
        });
        limpiar();
    }


}
// Te olvidaste poner el parametro
/* function resetpass() {

    var formData = new FormData($("#formulario")[0]);
    $.ajax({
        url: "../ajax/passwordrecovery_reset.php?op=resetpass",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,

        success: function (datos) {
         
            console.log(datos);
         
        }
    });
    limpiar();
} */
init();