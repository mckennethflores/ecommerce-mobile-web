<?php
ob_start();
session_start();
require_once "../modelos/Producto.php";

$producto = new Producto();

$idproducto=isset($_POST["idproducto"])? limpiarCadena($_POST["idproducto"]):"";
$idproductosublinea=isset($_POST["idproductosublinea"])? limpiarCadena($_POST["idproductosublinea"]):"";
$idunidadmedida=isset($_POST["idunidadmedida"])? limpiarCadena($_POST["idunidadmedida"]):"";
/* $codproducto=isset($_POST["codproducto"])? limpiarCadena($_POST["codproducto"]):""; */
/* $nomproducto=isset($_POST["nomproducto"])? limpiarCadena($_POST["nomproducto"]):""; */
$nomproductocorto=isset($_POST["nomproductocorto"])? limpiarCadena($_POST["nomproductocorto"]):"";
$codigobarra=isset($_POST["codigobarra"])? limpiarCadena($_POST["codigobarra"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";
/* $imagengrande=isset($_POST["imagengrande"])? limpiarCadena($_POST["imagengrande"]):""; */
/* $idproductoestado=isset($_POST["idproductoestado"])? limpiarCadena($_POST["idproductoestado"]):""; */
/* $idanexo_proveedor=isset($_POST["idanexo_proveedor"])? limpiarCadena($_POST["idanexo_proveedor"]):""; */
/* $valorventa=isset($_POST["valorventa"])? limpiarCadena($_POST["valorventa"]):""; */
/* $observacion=isset($_POST["observacion"])? limpiarCadena($_POST["observacion"]):""; */
$idmarca=isset($_POST["idmarca"])? limpiarCadena($_POST["idmarca"]):"";
/* $preciopromocion=isset($_POST["preciopromocion"])? limpiarCadena($_POST["preciopromocion"]):"";
$stockproducto=isset($_POST["stock"])? limpiarCadena($_POST["stock"]):""; */

//GET OBTENEMOS ELEMENTOS PARA MOSTRAR DATA DEL AJAX
$idlinea_cbo_ajax=isset($_GET["idlinea"])? limpiarCadena($_GET["idlinea"]):"";
/* $idsublinea_cbo_ajax=isset($_GET["idproductosublinea"])? limpiarCadena($_GET["idproductosublinea"]):""; */

/* OBTENER TIENDA */
if(isset($_GET["idstore"])){
    $idstore = $_GET["idstore"];
}if(isset($_GET["idsublinea"])){
    $idsublinea = $_GET["idsublinea"];
}
if(isset($_GET['offset'])){
    $offset = $_GET["offset"];
}
if(isset($_GET['limit'])){
    $limit = $_GET["limit"];
}

switch ($_GET["op"]){

    case 'guardaryeditar':

        if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
        {
            $imagen=$_POST["imagenactual1"];
        }
        else 
        {
            $ext = explode(".", $_FILES["imagen"]["name"]);
            if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png")
            {
                $imagen = round(microtime(true)) . '.' . end($ext);
                move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/productos/" . $imagen);
            }
        }
        if(empty($idproducto)){
            // $rspta=$producto->insertar($idproductosublinea, $idunidadmedida, $codproducto,$nomproducto,$nomproductocorto,$codigobarra,$imagen,$imagengrande,$idproductoestado,$idanexo_proveedor,$valorventa,$observacion,$idmarca,$preciopromocion,$stockproducto,$_SESSION['idtienda']);
                $rspta=$producto->insertar($idproductosublinea, $idunidadmedida,$nomproductocorto,$codigobarra,$imagen,$idmarca,$_SESSION['idtienda']);
                echo $rspta ? "Producto registrado": "El producto no se puede registrar";
        }else{
            //  $rspta=$producto->editar($idproducto, $idproductosublinea, $idunidadmedida, $codproducto,$nomproducto,$nomproductocorto,$codigobarra,$imagen,$imagengrande,$idproductoestado,$idanexo_proveedor,$valorventa,$observacion,$idmarca,$preciopromocion,$stockproducto);
                $rspta=$producto->editar($idproducto, $idproductosublinea, $idunidadmedida,$nomproductocorto,$codigobarra,$imagen,$idmarca);
                echo $rspta ? "Producto actualizado": "El producto no se puede actualizar";
        }
    break;

    case 'desactivar';
        $rspta=$producto->desactivar($idproducto);
        echo $rspta ? "Producto desactivado": "El producto no se puedo desactivar";
    break;

    case 'activar':
        $rspta=$producto->activar($idproducto);
        echo $rspta ? "Producto activado": "El producto no se puedo activar";
    break;

    case 'mostrar':
        $rspta=$producto->mostrar($idproducto);
        echo json_encode($rspta);
    break;
    
/*     Esta funcion permite mostrar el array de la lista de los productos pero con limit y offset. */

    case 'listProductsAndroid':
        $rspta=$producto->loadDataOnScroll($idstore,$limit,$offset);
        $data= Array();
        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                    "idproducto"=>$reg->idproducto,
                    "imagen"=>$reg->imagen,
                    "marca"=>$reg->marca,
                    "nombrecorto"=>$reg->nombrecorto,
                    "precioventa"=>$reg->precioventa,
                    "codigobarra"=>$reg->codigobarra,
                    "stock"=>$reg->stock
                );
        }
        echo json_encode($data);
    break;
    
    case 'listar':
        $rspta=$producto->listar($_SESSION['idtienda']);
        $data= Array();
        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                "0"=>($reg->idproductoestado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idproducto.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-danger" onclick="desactivar('.$reg->idproducto.')"><i class="fa fa-close"></i></button>':
                    '<button class="btn btn-warning" onclick="mostrar('.$reg->idproducto.')"><i class="fa fa-pencil"></i></button>'.
                    ' <button class="btn btn-primary" onclick="activar('.$reg->idproducto.')"><i class="fa fa-check"></i></button>',
                    "1"=>$reg->nomproductocorto,
                    "2"=>$reg->nomproductolinea,
                    "3"=>$reg->nomproductosublinea,
                    "4"=>$reg->valorventa,
                    "5"=>$reg->codigobarra,
                    "6"=>"<img src='../files/productos/".$reg->imagen."' height='50px' width='50px' >",
                    "7"=>($reg->idproductoestado)?'<span class="label bg-green">Activado</span>':'<span class="label bg-red">Desactivado</span>'
                );
        }
        $results = array(
            "sEcho"=>1, //Información para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        echo json_encode($results);
    break;

    case "selectSubLineaCbo":
        $rspta=$producto->listarSubLinea($idlinea_cbo_ajax);
        echo '<option value="0" selected disabled>Seleccione Sublinea</option>';
        while ($reg = $rspta->fetch_object())
            {
                echo '<option value=' . $reg->idproductosublinea . '>' . $reg->nomproductosublinea . '</option>';
            }
    break;    

    case "selectLinea":
        require_once "../modelos/Linea.php";
        $linea = new Linea();
        $rspta = $linea->listar();
        echo '<option value="0" selected disabled>Seleccione Linea</option>';        
        while ($reg = $rspta->fetch_object())
            {
                echo '<option value=' . $reg->idproductolinea . '>' . $reg->nomproductolinea . '</option>';
            }
    break;

    case "selectSubLinea":
        require_once "../modelos/SubLinea.php";
        $sublinea = new SubLinea();
        $rspta = $sublinea->select();
        echo '<option value="0" selected disabled>Seleccione Sublinea</option>';
        while ($reg = $rspta->fetch_object())
            {
                echo '<option value=' . $reg->idproductosublinea . '>' . $reg->nomproductosublinea . '</option>';
            }
    break;

    case "selectUnidadMedida":
        require_once "../modelos/UnidadMedida.php";
        $unidadmedida = new UnidadMedida();
        $rspta = $unidadmedida->select();
        echo '<option value="0" selected disabled>Seleccione Unidad de medida</option>';        
        while ($reg = $rspta->fetch_object()){
            echo '<option value=' . $reg->idunidadmedida . '>' . $reg->nomunidadmedida . '</option>';
        }
    break;

    case "selectProductoEstado":
        require_once "../modelos/ProductoEstado.php";
        $productoestado = new ProductoEstado();
        $rspta = $productoestado->select();
        while ($reg = $rspta->fetch_object()){
                    echo '<option value=' . $reg->idproductoestado . '>' . $reg->nomproductoestado . '</option>';
                }
    break;

    case "selectAnexoProveedor":
        require_once "../modelos/AnexoProveedor.php";
        $anexoproveedor = new AnexoProveedor();
        $rspta = $anexoproveedor->select();
        while ($reg = $rspta->fetch_object())
                {
                    echo '<option value=' . $reg->idanexo . '>' . $reg->nomanexo . '</option>';
                }
    break;

    case "selectMarca":
        require_once "../modelos/Marca.php";
        $marca = new Marca();
        $rspta = $marca->select();
        echo '<option value="0" selected disabled>Seleccione Marca</option>';
        while ($reg = $rspta->fetch_object())
                {
                    echo '<option value=' . $reg->id . '>' . $reg->descripcion . '</option>';
                }
    break;
/*     case "selectDistritos":
        $rspta = $calculatedelivery->listarDistritos();
        echo '<option value="0" selected disabled>Seleccione Distrito</option>';
        while ($reg = $rspta->fetch_object()){
            echo '<option value="' . $reg->id . '">' . $reg->descripcion . '</option>';
        }
        break; */
/* 	*********************************
		Funciones Android
    ********************************* */
        
    case 'listarproductosandroid':
        $rspta=$producto->listarproductostienda($idstore);
        $data= Array();
        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                    "idproducto"=>$reg->idproducto,
                    "imagen"=>$reg->imagen,
                    "marca"=>$reg->marca,
                    "nombrecorto"=>$reg->nombrecorto,
                    "precioventa"=>$reg->precioventa,
                    "codigobarra"=>$reg->codigobarra,
                    "stock"=>$reg->stock
                );
        }
        echo json_encode($data);
    break;

    case 'listarProductosSubLineaAndroid':
        $rspta=$producto->listarProductosSublinea($idstore,$idsublinea);
        $data= Array();
        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                    "idproducto"=>$reg->idproducto,
                    "imagen"=>$reg->imagen,
                    "marca"=>$reg->marca,
                    "nombrecorto"=>$reg->nombrecorto,
                    "precioventa"=>$reg->precioventa,
                    "codigobarra"=>$reg->codigobarra,
                    "stock"=>$reg->stock
                );
        }
        echo json_encode($data);
    break;
    case 'listarTituloSubLineaAndroid':
        $rspta=$producto->listarProductosSublineaTitulo($idstore,$idsublinea);
        $data= Array();
        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                    "nomproductosublinea"=>$reg->nomproductosublinea
                );
        }
        echo json_encode($data);
    break;

}