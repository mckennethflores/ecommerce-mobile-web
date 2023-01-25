<?php
/* 	*********************************
		Funciones Android
	********************************* */
require_once "../modelos/CarritoProducto.php";

$carritoproducto = new CarritoProducto();

$idpaprotemp=isset($_POST["idpaprotemp"])? limpiarCadena($_POST["idpaprotemp"]):"";
$idproducto=isset($_POST["idproducto"])? limpiarCadena($_POST["idproducto"]):"";
$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";

    switch($_GET["op"]){
        case 'guardarproductotemporal':
            if(empty($idpaprotemp)){
                $rspta=$carritoproducto->insertarpaprotemp($idproducto, $idusuario);
            }
        break;
        case 'listarproductostemporales':
            $rspta=$carritoproducto->listarproductostemporales($idusuario);
        break;
    }