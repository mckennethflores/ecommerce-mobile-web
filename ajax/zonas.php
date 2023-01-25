<?php
session_start();
require_once "../modelos/Zonas.php";

$zonas = new Zonas();

$id=isset($_POST["id"])? limpiarCadena($_POST["id"]):"";
$iddistrito=isset($_POST["iddistrito"])? limpiarCadena($_POST["iddistrito"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$desde=isset($_POST["desde"])? limpiarCadena($_POST["desde"]):"";
$hasta=isset($_POST["hasta"])? limpiarCadena($_POST["hasta"]):"";

    switch($_GET["op"]){

        case "selectDistritos":
            $rspta = $pedidos->listarDistritos();
            echo '<option value="0" selected disabled>Seleccione Distrito</option>';
            while ($reg = $rspta->fetch_object()){
                echo '<option value="' .  $reg->descripcion . '">' . $reg->descripcion . '</option>';
            }
        break;

        case 'guardaryeditar':

            if(empty($id)){
                $rspta=$zonas->insertar($iddistrito, $nombre, $desde,$hasta);
                echo $rspta ? "Zona registrada": "La zona no se puedo registrar";
            }else{
                $rspta=$zonas->editar($id,$iddistrito, $nombre, $desde,$hasta);
                echo $rspta ? "Zona actualizada": "La zona no se puedo actualizar";
            }
        break;

        case 'desactivar';
                $rspta=$zonas->desactivar($id);
                echo $rspta ? "Zona desactivada": "La zona no se puedo desactivar";
        break;
        
        case 'activar':
            $rspta=$zonas->activar($id);
            echo $rspta ? "Zona activada": "La zona no se puedo activar";
        break;

        case 'mostrar':
            $rspta=$zonas->mostrar($id);
            echo json_encode($rspta);

        break;

        case 'listarzonas':
            $rspta=$zonas->listarzonas();
            $data= Array();

            while ($reg=$rspta->fetch_object()){
                 
                $data[]=array(                    
                    "0"=>($reg->id)?'<button class="btn btn-warning" onclick="mostrar('.$reg->id.')"><i class="fa fa fa-eye"></i></button>'.
                    ' <button class="btn btn-danger" onclick="desactivar('.$reg->id.')">
                    <i class="fa fa-close"></i>
                    </button>'.'':' <button class="btn btn-warning" onclick="mostrar('.$reg->id.')"><i class="fa fa fa-eye"></i></button>'.
                    ' <button class="btn btn-primary" onclick="activar('.$reg->id.')"><i class="fa fa-check"></i></button>',
                    "1"=>$reg->distrito,
                    "2"=>$reg->nomzona
                );
            }
            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
                echo json_encode($results);
        break;
    }