<?php
/* 	*********************************
		Funciones Android
	********************************* */
session_start();
require_once "../modelos/Producto_Android.php";

$productoandroid = new Producto_Android();
$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";

    switch($_GET["op"]){
 
        case 'listar':
            $rspta=$productoandroid->listar();
            $data= Array();

            while ($reg=$rspta->fetch_object()){
                $data[]=array(
                    "0"=>$reg->idproducto,
                    "1"=>$reg->nomproductosublinea,
                    "2"=>$reg->nomproductolinea,
                    "3"=>$reg->nomunidadmedida,
                    "4"=>$reg->codunidadmedida,
                    "5"=>$reg->codproducto,
                    "6"=>$reg->nomproducto,
                    "7"=>$reg->nomproductocorto,
                    "8"=>$reg->codigobarra,
                    "9"=>$reg->imagen,
                    "10"=>$reg->imagengrande,
                    "11"=>$reg->nomproductoestado,
                    "12"=>$reg->nomanexo,
                    "13"=>$reg->valorventa,
                    "14"=>$reg->observacion,
                    "15"=>$reg->marcaza,
                    "16"=>$reg->preciopromocion,
                    "17"=>$reg->stockproducto,
                    "18"=>$reg->idproductoestado
                );
            }
            echo json_encode($data);
        break;
/*         AL INICIAR SESIÓN VALIDAR SI INGRESO LA SESIÓN */
        case 'validadireccion':

            $rspta=$productoandroid->validaDireccion($idusuario);
            $data= Array();
            while ($reg=$rspta->fetch_object()){
                $data[]=array(
                    "0"=>$reg->idusuario,
                    "1"=>$reg->iddistrito
                );
            }
            $result = count($data);
            if($result>0){
                //if se agrego entonces mandar un aler
                echo "Ya agrego una tienda, asi que puede comprar normal";
             }else{
                 //if no agregar producto
                  echo "ejecutar_vista";
             }
        break;
        
        case 'thereproductstempadded':

            $rspta=$productoandroid->thereProductsTempAdded($idusuario);
            $data= Array();
            while ($reg=$rspta->fetch_object()){
                $data[]=array(
                    "0"=>$reg->idproducto
                );
            }
            $result = count($data);
            if($result>0){
                //if se agrego entonces mandar un aler
                echo true;
             }else{
                 //if no agregar producto
                  echo false;
             }
        break;
        case 'deleteproductstempadded':

            $rspta=$productoandroid->deleteProductsTempAdded($idusuario);
            echo $rspta ? "Productos eliminados con exito": "Los productos no fueron eliminados";
        break;
        case 'selectDistritos':
            $rspta = $productoandroid->listarDistritos();
            while ($reg = $rspta->fetch_object()){
                        echo '<option value=' . $reg->id . '>' . $reg->descripcion . '</option>';
            }
        break;
    }