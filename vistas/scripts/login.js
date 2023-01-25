$("#frmAcceso").on('submit', function (e) {
    e.preventDefault();
    dniusuarioa = $("#dniusuarioa").val();
    claveusuarioa = $("#claveusuarioa").val();
    idtienda = $("#idtienda").val();

    $.post("../ajax/usuario.php?op=verificar", {
            "dniusuarioa": dniusuarioa,
            "claveusuarioa": claveusuarioa,
            "idtienda": idtienda
        },
        function (data) {
         //   console.log(data); return;
            if (data != "null") {
                $(location).attr("href", "escritorio.php");
            } else {
                bootbox.alert("Usuario y/o Password incorrectos");
            }
        });
});

function init() {

    $.post("../ajax/login.php?op=selectTiendas&opselected=selected", function (r) {
        $("#idtienda").html(r);
    });

}
init();