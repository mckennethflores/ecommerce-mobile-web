<?php
session_start();
require_once "../modelos/PasswordRecoveryReset.php";

$passwordrecoveryreset = new PasswordRecoveryReset();

$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$claveusuario=isset($_POST["claveusuario"])? limpiarCadena($_POST["claveusuario"]):"";
$rclaveusuario=isset($_POST["rclaveusuario"])? limpiarCadena($_POST["rclaveusuario"]):"";

    switch($_GET["op"]){

    case 'resetpass';
    $rspta=$passwordrecoveryreset->resetPass($idusuario,$claveusuario);
    echo $rspta ? "Se actualizo la nueva contraseña": "No se pudoactualizar la contraseña";
    break;
    
}