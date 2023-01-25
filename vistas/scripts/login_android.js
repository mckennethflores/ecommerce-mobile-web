/* 	*********************************
		Funciones Android
    ********************************* */
$("#frmAcceso").on('submit', function (e) {
    e.preventDefault();
    dniusuario = $("#dniusuario").val();
    claveusuario = $("#claveusuario").val();

    $.post("../ajax/usuario.php?op=verificarandroid_test", {
            "dniusuario": dniusuario,
            "claveusuario": claveusuario
        },
        function (data) {

        //    console.log(data); return;

            var objeto = JSON.parse(data);
//console.log(objeto.message);return;
            if (objeto.message == 'success') {
                console.log('Datos correctos');
                $(location).attr("href", "tiendas_android.php");
            } else {
                console.log('Usuario y/o Password incorrectos');
                /* Android.showToast('Usuario y/o Password incorrectos');  */
            }
        });
})