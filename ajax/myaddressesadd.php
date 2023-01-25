<?php
/* 	*********************************
		Funciones Android
	********************************* */
session_start();
require "../config/Conexion.php";
require_once "../modelos/MyAddressesAdd.php";

$myaddressesadd = new MyAddressesAdd();

$iddirecuser=isset($_POST["iddirecuser"])? limpiarCadena($_POST["iddirecuser"]):"";
$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$iddistrito=isset($_POST["iddistrito"])? limpiarCadena($_POST["iddistrito"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$calle=isset($_POST["calle"])? limpiarCadena($_POST["calle"]):"";
$piso=isset($_POST["piso"])? limpiarCadena($_POST["piso"]):"";



switch ($_GET["op"]){
 
    case 'guardaryeditar':
        if($iddistrito=='6' or $iddistrito=='24' or $iddistrito=='29' or $iddistrito=='6' or $iddistrito=='16'){
            if(empty($iddirecuser)){
                $rspta=$myaddressesadd->insertar($idusuario,$iddistrito,$direccion, $calle, $piso, "1");
               // echo $rspta ? "Se agrego dirección con exito": "No se pudo agregar la dirección";

                $resultado = array();
                $resultado["success"] = "yes";
                $resultado["message"] = "sihaycobertura";  
                echo json_encode($resultado);  
            } 
        }else{
            $resultado = array();
            $resultado["error"] = "yes";
            $resultado["message"] = "nohaycobertura";  
            echo json_encode($resultado);  
        }

    break;

    case "selectDistritos":
    $rspta = $myaddressesadd->listarDistritos();
    while ($reg = $rspta->fetch_object()){
        echo '<option value=' . $reg->id . '>' . $reg->descripcion . '</option>';
    }
     break;
    }