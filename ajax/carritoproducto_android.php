<?php
/* 	*********************************
		Funciones Android
	********************************* */
require_once "../modelos/CarritoProducto_Android.php";

$carritoproductoandroid = new CarritoProducto_Android();
    /**
    *   Iditem utilizo cuando quiero eliminar un item
    */
    if(isset($_POST["iditem"])){
        $iditem = $_POST["iditem"];
    }
    if(isset($_POST["idstore"])){
        $idstore = $_POST["idstore"];
    }
    if(isset($_GET["idstore"])){
        $idstore = $_GET["idstore"];
    }
    if(isset($_GET["recojoen"])){
        $recojoen = $_GET["recojoen"];
    }
/*  obtengo datos  de los input */
    $subtotal=isset($_POST["subtotal_input"])? limpiarCadena($_POST["subtotal_input"]):"";
    $pagacon=isset($_POST["pagacon_input"])? limpiarCadena($_POST["pagacon_input"]):"00.00";
    $tipodepago=isset($_POST["tipodepago"])? limpiarCadena($_POST["tipodepago"]):"";
    $idpaprotemp=isset($_POST["idpaprotemp"])? limpiarCadena($_POST["idpaprotemp"]):"";
    $idproducto=isset($_POST["idproducto"])? limpiarCadena($_POST["idproducto"]):"";
    $idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
    $precio=isset($_POST["precio"])? limpiarCadena($_POST["precio"]):"";
    $cantidad=isset($_POST["cantidad"])? limpiarCadena($_POST["cantidad"]):"";
    $delivery=isset($_POST["delivery_input"])? limpiarCadena($_POST["delivery_input"]):"";
    $total=isset($_POST["total_input"])? limpiarCadena($_POST["total_input"]):"";
    $recojoen=isset($_POST["recojoen_input"])? limpiarCadena($_POST["recojoen_input"]):"";
    $razonsoc=isset($_POST["razonsoc_input"])? limpiarCadena($_POST["razonsoc_input"]):"";
    $ruc=isset($_POST["ruc_input"])? limpiarCadena($_POST["ruc_input"]):"";
    $direccion=isset($_POST["direccion_input"])? limpiarCadena($_POST["direccion_input"]):"";
    $vuelto=isset($_POST["vuelto_input"])? limpiarCadena($_POST["vuelto_input"]):"";

    switch($_GET["op"]){

    /* Aqui guardamos los productos temporales y aqui haremos la validacion de circulo rojo */

        case 'guardarproductotemporal':

            $rsptaVerify=$carritoproductoandroid->verifyIfExistProductAddTemp($idusuario,$idproducto,$precio);
            $data= Array();
            while ($reg=$rsptaVerify->fetch_object()){
                $data[]=array(  "0"=>$reg->idproducto,  "1"=>$reg->idusuario );
            }
            $result = count($data);
            $resultado = array();
            if($result>0){
                //       echo "Ya se agrego este producto";
                $resultado["added"] = "yes";
                $resultado["message"] = "yaseagregoproducto";  
                echo json_encode($resultado);              
             }else{
                 //if no agregar producto
                 if(empty($reg->idproducto)){
                               
                //     echo "Se agrego el producto correctamente";  
                    $rspta=$carritoproductoandroid->inserProductTemp($idproducto,$idusuario,$precio,$cantidad);
                }
                // agrego cuantos productos va eligiendo
                $rsptaVerify=$carritoproductoandroid->thereProductsAdded($idusuario);
                $data= Array();
                while ($reg=$rsptaVerify->fetch_object()){
                    $data[]=array( "0"=>$reg->idusuario  );
                }   $result = count($data);  
                if($result>0){
                  //  $resultado["agregar"] = array(); 
                    $resultado["productsaddedtemp"] = "hay productos temporales";
                    $resultado["cantidad"] = "$result";      
                  //   array_push($resultado["agregar"],$result); 
                    echo json_encode($resultado);
                   //  echo $result;  
                }
            }
        break;
    /*     Aqui listamos los productos temporales */
        case 'listarproductostemporales':
          //   if($pagacon==''){    $pagacon = '0.00';  }  if($vuelto==''){    $vuelto = '0.00';  }
           $rspta=$carritoproductoandroid->listarproductostemporales($idusuario,$tipodepago,$recojoen,$subtotal,$pagacon = "0.00",$idstore,$total,$delivery,$razonsoc,$ruc,$direccion,$vuelto = "0.00");

           
           echo $rspta;
        break;
/* eliminamos un item */
        case 'eliminaritem':
        $rspta=$carritoproductoandroid->eliminaritem($idproducto);
            $rsptaVerify=$carritoproductoandroid->verifyAnyProductAdded($idusuario,$idproducto);
            $data= Array();
            while ($reg=$rsptaVerify->fetch_object()){
                $data[]=array(
                    "0"=>$reg->idusuario,
                    "1"=>$reg->idproducto
                );
            }
            $result = count($data);
            if($result>0){
                echo 'Producto removido con exito';
            }else{
                echo 'No hay productos en el carrito';
            }      
        break;
        case 'eliminarproducto':
        $rspta=$carritoproductoandroid->eliminaritem($idproducto);
            $rsptaVerify=$carritoproductoandroid->verifyAnyProductAdded("1",$idproducto);
            $data= Array();
            while ($reg=$rsptaVerify->fetch_object()){
                $data[]=array(
                    "0"=>$reg->idusuario,
                    "1"=>$reg->idproducto
                );
            }
            $result = count($data);
            if($result>0){
                echo 'Producto removido con exito';
            }else{
                echo 'No hay productos en el carrito';
            }      
        break;

        case 'thereProductsAdded':

            $rsptaVerify=$carritoproductoandroid->thereProductsAdded($idusuario);
            $data= Array();
            while ($reg=$rsptaVerify->fetch_object()){
                $data[]=array(  
                    "0"=>$reg->idusuario
                );
            }
            $result = count($data);
            if($result>0){
                echo $result;
             }
        break;
    }