<?php
/* 	*********************************
		Funciones Android
	********************************* */
session_start();
require "../config/Conexion.php";
require_once "../modelos/CalculateDelivery.php";

$calculatedelivery = new CalculateDelivery();

$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$idstore=isset($_POST["idstore"])? limpiarCadena($_POST["idstore"]):"";
$iddepartamento=isset($_POST["iddepartamento_input"])? limpiarCadena($_POST["iddepartamento_input"]):"";
$iddistrito=isset($_POST["iddistrito_input"])? limpiarCadena($_POST["iddistrito_input"]):"";
$idzona=isset($_POST["idzona_input"])? limpiarCadena($_POST["idzona_input"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$delivery=isset($_POST["predelive_input"])? limpiarCadena($_POST["predelive_input"]):"";

//GET OBTENEMOS ELEMENTOS PARA MOSTRAR DATA DEL AJAX
$iddepartamento_cbo_ajax=isset($_GET["iddepartamento"])? limpiarCadena($_GET["iddepartamento"]):"";
$iddistrito_cbo_ajax=isset($_GET["iddistrito"])? limpiarCadena($_GET["iddistrito"]):"";
$idzona_cbo_ajax=isset($_GET["idzona"])? limpiarCadena($_GET["idzona"]):"";

switch ($_GET["op"]){

    case "selectDepartamentos":
    $rspta = $calculatedelivery->listarDepartamento();
    echo '<option value="0" selected disabled>Seleccione Departamento</option>';
    while ($reg = $rspta->fetch_object()){
        echo '<option value="' . $reg->id . '">' . $reg->descripcion . '</option>';
    }
    break;
/*     codigo que solo muestra los distritos se uso antes de agregar el departamento de piura al aplicativo movil */
    /* case "selectDistritos":
    $rspta = $calculatedelivery->listarDistritos();
    echo '<option value="0" selected disabled>Seleccione Distrito</option>';
    while ($reg = $rspta->fetch_object()){
        echo '<option value="' . $reg->id . '">' . $reg->descripcion . '</option>';
    }
    break; */

    case "selectDistritos":
        $rspta = $calculatedelivery->listarDistritos($iddepartamento_cbo_ajax);
        echo '<option value="0" selected disabled>Seleccione Distrito</option>';
        while ($reg = $rspta->fetch_object()){
            echo '<option value="' . $reg->id . '">' . $reg->descripcion . '</option>';
        }
    break;

    case "selectZonas":
    $rspta = $calculatedelivery->listarZonas($iddistrito_cbo_ajax);
    echo '<option value="0" selected disabled>Seleccione Zona</option>';
    while ($reg = $rspta->fetch_object()){
        echo '<option value="' . $reg->id . '">' . $reg->nomzona . '</option>';
    }
    break;
    case "selectPrecio":
    $rspta = $calculatedelivery->listarPrecio($idzona_cbo_ajax);
    while ($reg = $rspta->fetch_object()){
        echo $reg->precio;
    }
    break;

    case 'guardarprecio':
        $rspta2=$calculatedelivery->desactivateadress($idusuario);
        $rspta=$calculatedelivery->insertar($idusuario,$idstore,$iddepartamento,$iddistrito, $idzona, $direccion,$delivery,'1');
        $resultado = array();
        $resultado["success"] = "yes";
        $resultado["message"] = "guardarprecio";  
        echo json_encode($resultado);
    break;
    }