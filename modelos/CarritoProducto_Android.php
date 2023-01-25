<?php
/* 	*********************************
		Funciones Android
    ********************************* */ 
require "../config/Conexion.php";

class CarritoProducto_Android{

    public function __construct(){

    }
    public function listarproductostemporales($idusuario,$tipodepago,$recojoen,$total,$pagacon,$idstore,$subtotal,$delivery,$razonsocial,$ruc,$direccion,$vuelto)
   {

    /* $dep = 
            [
                "idusuario" => $idusuario,
                "tipodepago" => $tipodepago,
                "recojoen" => $recojoen,
                "total" => $total,
                "pagacon" => $pagacon,
                "idstore" => $idstore,
                "subtotal" => $subtotal,
                "delivery" => $delivery,
                "razonsocial" => $razonsocial,
                "ruc" => $ruc,
                "direccion" => $direccion,
                "vuelto" => $vuelto,
            ];

            echo "DEPURACION::=". json_encode($dep); 
return; */

        $sql7="SELECT idpedido, idestadopedido FROM pedidos WHERE idusuario = '$idusuario' ORDER BY  idpedido DESC LIMIT 1";
        $verifyExistOrdersPending=ejecutarConsulta($sql7);
        while ($reg=$verifyExistOrdersPending->fetch_object()){
            $idestadopedido=$reg->idestadopedido;
        }
      //  echo $info = "info: $idestadopedido";
    if($idestadopedido!='1')
    {

        $fecha = date('Y-m-d H:i:s');
        $sql="SELECT * FROM paprotemp WHERE idusuario = $idusuario LIMIT 1";
        $productoscliente=ejecutarConsulta($sql);
        while ($reg=$productoscliente->fetch_object()){
            $reg->idusuario;

            $sql2="INSERT INTO `pedidos` (`idpedido`, `codigopedido`, `idusuario`, `fechapedido`, `idestadopedido`, `tipodepago`, `recojoen`, `total`, `pagacon`, `idstore`, `subtotal`, `delivery`, `razonsocial`, `ruc`, `direccion`, `vuelto`)
             VALUES (NULL, 'PTV00-$reg->idusuario','$reg->idusuario','$fecha','1','$tipodepago','$recojoen','$total','$pagacon','$idstore','$subtotal','$delivery','$razonsocial','$ruc','$direccion','$vuelto')";
           
           ejecutarConsulta($sql2);
          
           /*  $idpedidonew=ejecutarConsulta_retornarID($sql2);
            $sqlUpdateOrder="UPDATE pedidos SET codigopedido='P00-$idpedidonew' WHERE idpedido='$idpedidonew'";
            ejecutarConsulta($sqlUpdateOrder); */

           /*  if($idstore=='321320'){
              enviarmensajePedidoNuevo("juniorllontopmoreno@gmail.com");  
            }else{
                enviarmensajePedidoNuevo("oswaldoelflori@gmail.com");
            } */
            
        }

        $sql3="SELECT * FROM  `pedidos` WHERE  idusuario = $idusuario ORDER BY  idpedido DESC LIMIT 1";
        $pedido=ejecutarConsulta($sql3);
        while ($reg=$pedido->fetch_object()){
            $idpedido=$reg->idpedido;
        }
         
        $sql4="SELECT * FROM `paprotemp` WHERE idusuario = $idusuario";
        $productoscliente=ejecutarConsulta($sql4);
        while ($reg=$productoscliente->fetch_object()){
            $reg->idpaprotemp;
            $reg->idproducto;
            $reg->cantidad;
            $reg->idusuario;
            $reg->precio;
            $sql5="INSERT INTO `lineaspedido` (`idpedidolineaspedido`, `idproductolineaspedido`, `unidadeslineaspedido`, `preciolineaspedido`) VALUES
            ('$idpedido', '$reg->idproducto', '$reg->cantidad', '$reg->precio')";
            ejecutarConsulta($sql5);
        }
     
        $sqlDeleteProductsTemp="DELETE FROM paprotemp WHERE idusuario='$idusuario'";
        ejecutarConsulta($sqlDeleteProductsTemp);
        $sqlDeleteStoreTemp="DELETE FROM tiendatemp WHERE idusuario='$idusuario'";
        ejecutarConsulta($sqlDeleteStoreTemp);
    }
   }

    public function listarprodtemp($idusuario)
    {
       $sql="SELECT
       ppt.idpaprotemp,
       p.imagen,
       p.nomproductocorto,
       p.valorventa,
       u.idusuario,
       ppt.cantidad,
       ppt.idproducto
       FROM
       paprotemp AS ppt
       INNER JOIN producto AS p ON p.idproducto = ppt.idproducto
       INNER JOIN sb_usuarios AS u ON u.idusuario = ppt.idusuario WHERE u.idusuario = $idusuario";
       return ejecutarConsulta($sql);		
    }
    public function listarRecojoEnTienda($idusuario)
    {
       $sql="SELECT
       pedidos.idpedido,
       sb_usuarios.nomusuario,
       pedidos.fechapedido,
       DATE_FORMAT(pedidos.fechapedido, '%d-%m-%Y %H:%i') AS fecha_,
       pedidos.recojoen,
       pedidos.tipodepago,
       pedidos.total,
       pedidos.delivery,
       pedidos.pagacon,
       pedidos.subtotal,
       pedidos.idstore,
       pedidos.idusuario
       FROM pedidos 
              INNER JOIN sb_usuarios ON sb_usuarios.idusuario = pedidos.idusuario
       
       WHERE pedidos.idusuario='$idusuario' ORDER BY  pedidos.idpedido DESC LIMIT 1";
          

       return ejecutarConsulta($sql);		
    }
    public function eliminaritem($idproducto){
        $sql="DELETE FROM paprotemp WHERE idproducto='$idproducto'";
        return ejecutarConsulta($sql);
    }
    public function verifyAnyProductAdded($idusuario,$idproducto)
    {
       $sql="SELECT * FROM `paprotemp` WHERE idusuario = $idusuario";
       return ejecutarConsulta($sql);
    }
    public function verifyIfExistProductAddTemp($idusuario,$idproducto,$precio)
    {
       $sql="SELECT * FROM `paprotemp` WHERE idproducto = '$idproducto' and idusuario = '$idusuario'  and precio = '$precio'";
       return ejecutarConsulta($sql);
    }
    public function inserProductTemp($idproducto,$idusuario,$precio,$cantidad)
    {
        $sql="INSERT INTO paprotemp (idproducto,idusuario,precio,cantidad)
        VALUES('$idproducto','$idusuario','$precio','$cantidad')";
        ejecutarConsulta($sql);
        if(isset($sql)){
			$result["exito"] = "1";
			$result["message"] = "exito";
		  json_encode($result);
	  	}
    }    
    public function selectStoreFrom($idusuario)
    {
        $sql3="SELECT * FROM  `tiendatemp` WHERE  idusuario = '$idusuario' ORDER BY  id DESC LIMIT 1";
        $tienda=ejecutarConsulta($sql3);
        while ($reg=$tienda->fetch_object()){
            $idusuario=$reg->idusuario;
            $idstore=$reg->idstore;

        $sql4="SELECT distritos.descripcion AS distrito,  tiendas.idstore,  tiendas.nomtienda,
        tiendas.directienda,  tiendas.icontienda,  tiendas.iddistrito as iddistrito
        FROM tiendas INNER JOIN distritos ON distritos.id = tiendas.iddistrito WHERE tiendas.idstore = '$idstore'";
        $tienda4=ejecutarConsulta($sql4);
        $resultado = "";
        while ($reg4=$tienda4->fetch_object()){
            $idstore=$reg4->idstore;
            $resultado .= '<input name="idstore" value="'.$idstore.'"  type="hidden">';

            $_SESSION['iddistrito_origen'] = $reg4->iddistrito;
            $resultado .= '<span>'.$reg4->nomtienda.' </span>  <p>'.$reg4->directienda.'</p>';
            return $resultado;
        }
      }
    }
    public function selectStoreDestination($idusuario)
    {
        $sql3="SELECT
        sb_usuarios.idusuario,
        sb_usuarios.nomusuario,
        direcuser.direccion,
        direcuser.selected,
        distritos.id AS iddistrito,
        distritos.descripcion AS distrito,
        zonas.nomzona,
        direcuser.delivery FROM direcuser
        INNER JOIN sb_usuarios ON sb_usuarios.idusuario = direcuser.idusuario
        INNER JOIN distritos ON distritos.id = direcuser.iddistrito
        INNER JOIN zonas ON zonas.id = direcuser.idzona
        WHERE sb_usuarios.idusuario = '$idusuario' and direcuser.selected = '1'";
        $tienda=ejecutarConsulta($sql3);
        while ($reg=$tienda->fetch_object()){
            $_SESSION['iddistrito_destino'] = $reg->iddistrito;
            $_SESSION['delivery_destino'] = $reg->delivery;
            
        return "Distrito: ".$reg->distrito."<br> Zona: ".$reg->nomzona.", ".$reg->direccion;
      }
    }
    public function getIdDestination($idusuario)
    {
        $sql3="SELECT
        sb_usuarios.idusuario,
        sb_usuarios.nomusuario,
        direcuser.direccion,
        direcuser.selected,
        distritos.id AS iddistrito,
        distritos.descripcion AS distrito,
        zonas.nomzona,
        direcuser.delivery FROM direcuser
        INNER JOIN sb_usuarios ON sb_usuarios.idusuario = direcuser.idusuario
        INNER JOIN distritos ON distritos.id = direcuser.iddistrito
        INNER JOIN zonas ON zonas.id = direcuser.idzona
        WHERE sb_usuarios.idusuario = '$idusuario' and direcuser.selected = '1'";
        $tienda=ejecutarConsulta($sql3);
        while ($reg=$tienda->fetch_object()){            
        echo $reg->iddistrito;
      }
    }
    public function thereProductsAdded($idusuario)
    {
       $sql="SELECT * FROM `paprotemp` WHERE idusuario = '$idusuario' ";
       return ejecutarConsulta($sql);
    }
}
?>