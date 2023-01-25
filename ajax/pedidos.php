<?php
session_start();
require_once "../modelos/Pedidos.php";

$pedidos = new Pedidos();

$idpedido=isset($_POST["idpedido"])? limpiarCadena($_POST["idpedido"]):"";
$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$fechapedido=isset($_POST["fechapedido"])? limpiarCadena($_POST["fechapedido"]):"";
$idestadopedido=isset($_POST["idestadopedido"])? limpiarCadena($_POST["idestadopedido"]):"";
$monedapedido=isset($_POST["monedapedido"])? limpiarCadena($_POST["monedapedido"]):"";

    switch($_GET["op"]){

        case "selectDistritos":
            $rspta = $pedidos->listarDistritos();
            echo '<option value="0" selected disabled>Seleccione Distrito</option>';
            while ($reg = $rspta->fetch_object()){
                echo '<option value="' .  $reg->descripcion . '">' . $reg->descripcion . '</option>';
            }
        break;
        
        case 'guardaryeditar':

            if(empty($idpedido)){
                $rspta=$pedidos->insertar($idusuario, $fechapedido, $idestadopedido,$monedapedido);
                echo $rspta ? "Pedido registrado": "El pedido no se puedo registrar";
            }else{
                $rspta=$pedidos->editar($idpedido,$idestadopedido);
                echo $rspta ? "Pedido actualizado": "El pedido no se puedo actualizar";
            }
        break;

        case 'desactivar';
                $rspta=$pedidos->desactivar($idpedido);
                echo $rspta ? "Pedido desactivado": "El pedido no se puedo desactivar";
        break;
        
        case 'activar':
            $rspta=$pedidos->activar($idpedido);
            echo $rspta ? "Pedido activado": "El pedido no se puedo activar";
        break;

        case 'mostrar':
            $rspta=$pedidos->mostrar($idpedido);
            echo json_encode($rspta);

        break;
        
        case 'listarpedidos':
            $rspta=$pedidos->listarpedidos($_SESSION['idtienda']);
            $data= Array();

            while ($reg=$rspta->fetch_object()){
                $url='../reportes/exTicket.php?id=';
                $cliente = $reg->idusuario;
                $data[]=array(                    
                    "0"=>($reg->idpedido)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idpedido.','.$cliente.')"><i class="fa fa fa-eye"></i></button>'.
                    ' <button class="btn btn-danger" onclick="desactivar('.$reg->idpedido.')"><i class="fa fa-close"></i></button>'.'<a target="_blank" href="'.$url.$reg->idpedido.'"> <button class="btn btn-info"><i class="fa fa-file"></i></button></a>':
                    ' <button class="btn btn-warning" onclick="mostrar('.$reg->idpedido.','.$cliente.')"><i class="fa fa fa-eye"></i></button>'.
                    ' <button class="btn btn-primary" onclick="activar('.$reg->idpedido.')"><i class="fa fa-check"></i></button>',
                    "1"=>$reg->codigopedido,
                    "2"=>$reg->nomusuario,
                    "3"=>$reg->telusuario,    
                    "4"=>$reg->fechapedido,
                    "5"=>$reg->estado,
                    "6"=>$reg->total 
                );
            }
            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
                echo json_encode($results);
        break;

        case 'listarpedidosgeneral':
            $rspta=$pedidos->listarpedidosgeneral();
            $data= Array();

            while ($reg=$rspta->fetch_object()){
                $url='../reportes/exTicket.php?id=';
                $cliente = $reg->idusuario;
                $direcTienda = $reg->directienda;
                $direcTiendaShort = substr($direcTienda, 0, 4);
                $data[]=array(                    
                    "0"=>($reg->idpedido)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idpedido.','.$cliente.')"><i class="fa fa fa-eye"></i></button>'.
                    ' <button class="btn btn-danger" onclick="desactivar('.$reg->idpedido.')"><i class="fa fa-close"></i></button>'.'<a target="_blank" href="'.$url.$reg->idpedido.'"> <button class="btn btn-info"><i class="fa fa-file"></i></button></a>':
                    ' <button class="btn btn-warning" onclick="mostrar('.$reg->idpedido.','.$cliente.')"><i class="fa fa fa-eye"></i></button>'.
                    ' <button class="btn btn-primary" onclick="activar('.$reg->idpedido.')"><i class="fa fa-check"></i></button>',
                    "1"=>$reg->nomtienda.' / '.$reg->codigotienda,
                    "2"=>$reg->nomusuario,
                    "3"=>$reg->telusuario,    
                    "4"=>$reg->fechapedido,
                    "5"=>$reg->estado,
                    "6"=>'S/ '.$reg->total 
                );
            }
            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
                echo json_encode($results);
        break;        
            
        case 'mostrardetallepedido':
            //Recibimos el idingreso
            $id=$_GET['id'];
            $idcliente=$_GET['idcliente'];
    
            $rspta = $pedidos->mostrardetallepedido($id);
            $total=0;
            echo '<thead style="background-color:#A9D0F5">
                 <th>Opciones</th> <th>Artículo</th> <th>Cantidad</th> <th>Precio</th> <th>Subtotal</th>
                 </thead>';
    
            while ($reg = $rspta->fetch_object())
                    {   
                        echo '<tr class="filas"><td> <img src="../files/productos/'.$reg->imagenproducto.'" height="42" width="42"></td><td>'.$reg->nombreproductocorto.'</td><td>'.$reg->unidadeslineaspedido.'</td><td>'.$reg->preciolineaspedido.'</td><td>'.number_format($reg->preciolineaspedido*$reg->unidadeslineaspedido, 2, ',', ' ').'</td></tr>';
                        
                        $total=$total+($reg->preciolineaspedido*$reg->unidadeslineaspedido);
                        $total_=number_format($total, 2, ',', ' ');
                    }
            echo '<tr>
                    <th>Sub Total</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>
                    <h4 id="total">S/.'.$total_.'</h4> <input type="hidden" name="total_compra" id="total_compra">
                    </th> 
                  </tr>';
            
                $rspta2=$pedidos->listarpedidos_delivery($idcliente);
                while ($reg = $rspta2->fetch_object())
                {            
                echo '<tr>
                        <th>Delivery</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><h4 id="total">S/'.$reg->delivery.'</h4><input type="hidden" name="total_compra" id="total_compra"></th> 
                    </tr>';
                }
                $rspta=$pedidos->listarpedidos_delivery($idcliente);

                while ($reg = $rspta->fetch_object())
                {
                    echo '<tfoot>
                    <th>TOTAL</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><h4 id="total">S/'.$reg->total.'</h4><input type="hidden" name="total_compra" id="total_compra"></th> 
                </tfoot>';  
                }
        break;
    
        case "selectUsuario":
            require_once "../modelos/Usuario.php";
            $usuario = new Usuario();
            $rspta = $usuario->listar();
            while ($reg = $rspta->fetch_object())
                    {
                        echo '<option value=' . $reg->idusuario . '>' . $reg->nomusuario . '</option>';
                    }
        break;

        case "selectEstado":
            require_once "../modelos/Producto.php";
            $estado = new Producto();
            $rspta = $estado->listarProductoEstado();
            while ($reg = $rspta->fetch_object())
                    {
                        echo '<option value=' . $reg->idproductoestado . '>' . $reg->nomproductoestado . '</option>';
                    }
        break;

    }
