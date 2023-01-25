<?php

session_start();
require_once "../modelos/SubLinea.php";

$sublinea=new SubLinea();

$idsublinea=isset($_POST["idsublinea"])? limpiarCadena($_POST["idsublinea"]):"";
$idlinea=isset($_POST["idlinea"])? limpiarCadena($_POST["idlinea"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";

switch ($_GET["op"]){

	case 'guardaryeditar':

		if(empty($idsublinea)){
			$rspta=$sublinea->insertar($idlinea, $nombre);
			echo $rspta ? "Sublinea registrada": "Sublinea no se puedo registrar";
		}else{
			$rspta=$sublinea->editar($idsublinea,$idlinea, $nombre);
			echo $rspta ? "Sublinea actualizada": "Sublinea no se puedo actualizar";
		}
	break;

	case 'desactivar';
			$rspta=$sublinea->desactivar($idsublinea);
			echo $rspta ? "Sublinea desactivada": "Sublinea no se pudo desactivar";
	break;

	case 'activar':
		$rspta=$sublinea->activar($idsublinea);
		echo $rspta ? "Sublinea activada": "Sublinea no se puedo activar";
	break;	
	
	case 'mostrar':
		$rspta=$sublinea->mostrar($idsublinea);
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$sublinea->listar();
		$data= Array();
		while ($reg=$rspta->fetch_object()){

			$data[]=array(
				"0"=>($reg->condicion)?"<button class='btn btn-warning' onclick='mostrar(".$reg->idproductosublinea.")'><i class='fa fa-pencil'></i></button>".
				" <button class='btn btn-danger' onclick='desactivar(".$reg->idproductosublinea.")'><i class='fa fa-close'></i></button>":
				"<button class='btn btn-warning' onclick='mostrar(".$reg->idproductosublinea.")'><i class='fa fa-pencil'></i></button>".
				" <button class='btn btn-primary' onclick='activar(".$reg->idproductosublinea.")'><i class='fa fa-check'></i></button>",
				"1"=>$reg->nomproductolinea,
				"2"=>$reg->nomproductosublinea,
				"3"=>$reg->condicion
			);
		}
		$results = array(
			"sEcho"=>1, // Info para el datables
			"iTotalRecords"=>count($data), // Envio total de registros al datatables
			"iTotalDisplayRecords"=>count($data), // Total de registros a visualizar
			"aaData"=>$data);
		echo json_encode($results);
	break;
	
	case 'selectSublinea':
		$rspta = $sublinea->listar();
		while ($reg = $rspta->fetch_object()){
					echo '<option value=' . $reg->idproductosublinea . '>' . $reg->nomproductosublinea . '</option>';
		}
	break;
}