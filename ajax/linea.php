<?php
session_start();
require_once "../modelos/Linea.php";

$linea=new Linea();

$idlinea=isset($_POST["idlinea"])? limpiarCadena($_POST["idlinea"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";

    switch($_GET["op"]){
        
        case 'guardaryeditar':

            if(empty($idlinea)){
                $rspta=$linea->insertar($nombre, $imagen);
                echo $rspta ? "Linea registrada": "Linea no se puedo registrar";
            }else{
                $rspta=$linea->editar($idlinea,$nombre, $imagen);
                echo $rspta ? "Linea actualizada": "Linea no se puedo actualizar";
            }
        break;

        case 'desactivar';
                $rspta=$linea->desactivar($idlinea);
                echo $rspta ? "Linea desactivada": "Linea no se pudo desactivar";
        break;

        case 'activar':
            $rspta=$linea->activar($idlinea);
            echo $rspta ? "Linea activada": "Lina no se puedo activar";
        break;

        case 'mostrar':
            $rspta=$linea->mostrar($idlinea);
            echo json_encode($rspta);
        break;

        case 'listar':
            $rspta=$linea->listar();
            $data= Array();
            while ($reg=$rspta->fetch_object()){

                $data[]=array(
                    "0"=>($reg->condicion)?"<button class='btn btn-warning' onclick='mostrar(".$reg->idproductolinea.")'><i class='fa fa-pencil'></i></button>".
                    " <button class='btn btn-danger' onclick='desactivar(".$reg->idproductolinea.")'><i class='fa fa-close'></i></button>":
                    "<button class='btn btn-warning' onclick='mostrar(".$reg->idproductolinea.")'><i class='fa fa-pencil'></i></button>".
                    " <button class='btn btn-primary' onclick='activar(".$reg->idproductolinea.")'><i class='fa fa-check'></i></button>",
                    "1"=>$reg->nomproductolinea,
                    "2"=>$reg->imagen,
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
        
        case 'selectLinea':
            require_once "../modelos/Linea.php";
            $linea = new Linea();
            $rspta = $linea->listar();
            while ($reg = $rspta->fetch_object())
            {
                echo '<option value=' . $reg->idproductolinea . '>' . $reg->nomproductolinea . '</option>';
            }
        break;
}