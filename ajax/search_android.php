<?php
ob_start();
session_start();
require_once "../modelos/SearchAndroid.php";

$searchandroid = new SearchAndroid();

$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$nameproduct=isset($_POST["nameproduct"])? limpiarCadena($_POST["nameproduct"]):"";
$idstore=isset($_POST["idstore"])? limpiarCadena($_POST["idstore"]):"";

/* OBTENER TIENDA */
/* if(isset($_GET["idstore"])){
    $idstore = $_GET["idstore"];
}if(isset($_GET["idsublinea"])){
    $idsublinea = $_GET["idsublinea"];
} */
switch ($_GET["op"]){

    case 'buscar':

            $rspta=$searchandroid->searchProduct($nameproduct,$idstore);

            while ($reg = $rspta->fetch_object()){
                echo '<div class="product-unit">
                <div class="image"> <img width="120" src="../files/productos/'.$reg->imagen.'"> </div>
                <div class="brand">'.$reg->marca.'</div>
                <div class="name">'.$reg->nomproductocorto.'</div>
                <div class="price-unit">S/ '.$reg->valorventa.' c/u</div>
                <span class="stockPrecio"> '.$reg->stock.' </span>
                <span class="codigoBarra"> '.$reg->codigobarra.' </span>
                <div class="indicadoresCantidad">
                <button type="button" class="btn-right decrementar'.$reg->idproducto.' " onclick="decrementar('.$reg->idproducto.')"><i class="fas fa-minus-circle"></i></button>
                <input type="text" readonly id="input'.$reg->idproducto.'" value="1">
                <button type="button" class="btn-left incrementar'.$reg->idproducto.'" onclick="incrementar('.$reg->idproducto.')"><i class="fas fa-plus-circle"></i></button>
                <input type="button" class="comprar_btn" onclick="comprar_fun(\''.$reg->idproducto.'\',\''.$reg->valorventa.'\')" value="Comprar">
                </div></div>';
            } 
    break;
}