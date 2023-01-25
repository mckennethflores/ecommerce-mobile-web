<?php
/* 	*********************************
		Funciones Android
	********************************* */
session_start();
require "../config/Conexion.php";
require_once "../modelos/LibroReclamaciones.php";

$libroreclamaciones = new LibroReclamaciones();

$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$idstore=isset($_POST["idstore"])? limpiarCadena($_POST["idstore"]):"";
$idtienda=isset($_POST["idtienda"])? limpiarCadena($_POST["idtienda"]):"";
$docdni=isset($_POST["docdni"])? limpiarCadena($_POST["docdni"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$apellidos=isset($_POST["apellidos"])? limpiarCadena($_POST["apellidos"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$departamento=isset($_POST["departamento"])? limpiarCadena($_POST["departamento"]):"";
$idprovincia=isset($_POST["idprovincia"])? limpiarCadena($_POST["idprovincia"]):"";
$iddistrito=isset($_POST["iddistrito"])? limpiarCadena($_POST["iddistrito"]):"";
$telefono=isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
$email=isset($_POST["email"])? limpiarCadena($_POST["email"]):"";
$monto=isset($_POST["monto"])? limpiarCadena($_POST["monto"]):"";
$marca=isset($_POST["marca"])? limpiarCadena($_POST["marca"]):"";
$tiporeclamo=isset($_POST["tiporeclamo"])? limpiarCadena($_POST["tiporeclamo"]):"";
$motivo=isset($_POST["motivo"])? limpiarCadena($_POST["motivo"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$claimtype=isset($_POST["claimtype"])? limpiarCadena($_POST["claimtype"]):"";
$detreclamo=isset($_POST["detreclamo"])? limpiarCadena($_POST["detreclamo"]):"";
$numpedido=isset($_POST["numpedido"])? limpiarCadena($_POST["numpedido"]):"";

switch ($_GET["op"]){
    
    case "selectTiendas":
    $rspta = $libroreclamaciones->listarTiendas();
/*     echo '<option value="0" selected disabled>Seleccione Tienda</option>'; */
echo '<option value="1" selected >Tienda1</option>';
    while ($reg = $rspta->fetch_object()){
        echo '<option value="' .  $reg->nomtienda . '">' . $reg->nomtienda . '</option>';
    }
    break;

    case "selectDistritos":
    $rspta = $libroreclamaciones->listarDistritos();
    echo '<option value="1" selected >Distrito 1</option>';
/*     echo '<option value="0" selected disabled>Seleccione Distrito</option>'; */
    while ($reg = $rspta->fetch_object()){
        echo '<option value="' .  $reg->descripcion . '">' . $reg->descripcion . '</option>';
    }
    break;

    case 'guardar':

/*         $rsptaCustomer = $libroreclamaciones->dataCustomer($idusuario);
        $data= Array(); */
       /*  while ($reg=$rsptaCustomer->fetch_object()){
            $data[]=array(  "0"=>$reg->idusuario,  "1"=>$reg->emailusuario );
           
        } */
/*         while ($reg = $rsptaCustomer->fetch_object())
                {
                    $per->emailusuario;
                } */
        enviarReclamo("oswaldoelflori@gmail.com",$idusuario,$idstore,$idtienda,$docdni,$nombre,$apellidos,$direccion,$departamento,$idprovincia,$iddistrito,$telefono,$email,$monto,$marca,$tiporeclamo,$motivo,$descripcion,$claimtype,$detreclamo,$numpedido);
        $resultado = array();
        $resultado["success"] = "yes";
        $resultado["message"] = "mensajeenviado";
        echo json_encode($resultado);

    break;
    }