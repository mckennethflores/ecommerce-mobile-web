<?php
session_start();
require_once "../modelos/Marca.php";

$marca=new Marca();

$idmarca=isset($_POST["idmarca"])? limpiarCadena($_POST["idmarca"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";

    switch($_GET["op"]){
        
        case 'guardaryeditar':

            if(empty($idmarca)){
                $rspta=$marca->insertar($nombre);
                echo $rspta ? "Marca registrada": "Marca no se puedo registrar";
            }else{
                $rspta=$marca->editar($idmarca,$nombre);
                echo $rspta ? "Marca actualizada": "Linea no se puedo actualizar";
            }
        break;

        case 'desactivar';
                $rspta=$marca->desactivar($idmarca);
                echo $rspta ? "Marca desactivada": "Marca no se pudo desactivar";
        break;

        case 'activar':
            $rspta=$marca->activar($idmarca);
            echo $rspta ? "Marca activada": "Marca no se puedo activar";
        break;

        case 'mostrar':
            $rspta=$marca->mostrar($idmarca);
            echo json_encode($rspta);
        break;

        case 'listar':
            $rspta=$marca->select();
            $data= Array();
            while ($reg=$rspta->fetch_object()){

                $data[]=array(
                    "0"=>($reg->condicion)?"<button class='btn btn-warning' onclick='mostrar(".$reg->id.")'><i class='fa fa-pencil'></i></button>".
                    " <button class='btn btn-danger' onclick='desactivar(".$reg->id.")'><i class='fa fa-close'></i></button>":
                    "<button class='btn btn-warning' onclick='mostrar(".$reg->id.")'><i class='fa fa-pencil'></i></button>".
                    " <button class='btn btn-primary' onclick='activar(".$reg->id.")'><i class='fa fa-check'></i></button>",
                    "1"=>$reg->descripcion,
                    "2"=>$reg->condicion
                );
            }
            $results = array(
                "sEcho"=>1, // Info para el datables
                "iTotalRecords"=>count($data), // Envio total de registros al datatables
                "iTotalDisplayRecords"=>count($data), // Total de registros a visualizar
                "aaData"=>$data);
            echo json_encode($results);
        break;

}