<?php
/* 	*********************************
		Funciones Android
	********************************* */
    session_start();
    require_once "../modelos/Linea_Android.php";
    $lineaandroid = new Linea_Android();
/* listo la linea de productos */
    switch($_GET["op"]){
 
        case 'listar':
            $rspta=$lineaandroid->listar();
            $data= Array();

            while ($reg=$rspta->fetch_object()){
                $data[]=array(
                    "0"=>$reg->idproductolinea,
                    "1"=>$reg->nomproductolinea,
                    "2"=>$reg->imagenproductolinea
                );
            }
            echo json_encode($data);
        break;
        case 'listCategoryLine':
            $rspta=$lineaandroid->listCategoryLine();
            $data= Array();

            while ($reg=$rspta->fetch_object()){
                $data[]=array(
                    "idproductolinea"=>$reg->idproductolinea,
                    "nomproductolinea"=>$reg->nomproductolinea,
                    "imagen"=>$reg->imagen
                );
            }
            echo json_encode($data);
        break;
    }