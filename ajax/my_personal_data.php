<?php
ob_start();
session_start();
require_once "../modelos/MyAddresses.php";

$myaddresses = new MyAddresses();

 $idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
 $iddistrito_destino=isset($_POST["idusuario"])? limpiarCadena($_POST["iddistrito_destino"]):"";

/* OBTENER TIENDA */
if(isset($_GET["iddirecuser"])){
    $iddirecuser = $_GET["iddirecuser"];
}
switch ($_GET["op"]){

    case 'guardardireccion':
        $rspta=$myaddresses->actualizardireccion($idusuario,$iddirecuser,$iddistrito_destino);
        echo $rspta;
         /* ? "Direccion Actualizada": "La dirección no se pudo Actualizar";
  */
        
    break;
 

}