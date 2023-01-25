<?php
session_start();
require_once "../modelos/Tiendas.php";

$tiendas = new Tiendas();

$idstore=isset($_POST["idstore"])? limpiarCadena($_POST["idstore"]):"";
$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";

    switch($_GET["op"]){

        case 'listartiendas':
            $rspta=$tiendas->listartiendas();
            $data= Array();

            while ($reg=$rspta->fetch_object()){
                $data[]=array(
                    "0"=>$reg->idtienda,
                    "1"=>$reg->nomtienda,
                    "2"=>$reg->directienda,
                    "3"=>$reg->icontienda
                );
            }
            echo json_encode($data);
        break;
        case 'listartiendasDireccion':
            $rspta=$tiendas->listartiendasDireccion(1);
            $data= Array();

            while ($reg=$rspta->fetch_object()){
                $data[]=array(
                    "0"=>$reg->idtienda,
                    "1"=>$reg->nomtienda,
                    "2"=>$reg->directienda,
                    "3"=>$reg->icontienda
                );
            }
            echo json_encode($data);
        break;

/* 	*********************************
		Funciones Android
    ********************************* */
            
        case 'guardaryeditartemporal':
                $rspta=$tiendas->insertartiendatemporal($idusuario,$idstore);
                echo $rspta ? "Tienda Seleccionada": "No selecciono su tienda";
        break;

    }