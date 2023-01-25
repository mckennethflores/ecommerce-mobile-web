<?php
/* 	*********************************
		Funciones Android
    ********************************* */
    
session_start();
require "../config/Conexion.php";

class CarritoProducto{

    public function __construct(){

    }

   public function listarproductostemporales($idusuario){
        $fecha = date('Y-m-d');
        $sql="SELECT * FROM `paprotemp` WHERE idusuario = $idusuario  LIMIT 1";
        $productoscliente=ejecutarConsulta($sql);

        while ($reg=$productoscliente->fetch_object()){
            $reg->idusuario;
            $sql2="INSERT INTO `pedidos` (`idusuario`, `fechapedido`, `idestadopedido`, `monedapedido`) VALUES
             ('$reg->idusuario','$fecha','1','S/')";
            ejecutarConsulta($sql2);
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
            $reg->idusuario;
            $reg->precio;

            $sql5="INSERT INTO `lineaspedido` (`idpedidolineaspedido`, `idproductolineaspedido`, `unidadeslineaspedido`, `preciolineaspedido`) VALUES
            ('$idpedido', '$reg->idproducto', '1', '$reg->precio')";
            ejecutarConsulta($sql5);
        }
        $sql="DELETE FROM paprotemp WHERE idusuario='$idusuario'";
        ejecutarConsulta($sql);
   }

    public function insertarpaprotemp($idproducto, $idusuario){
        
        $sql="INSERT INTO `paprotemp` (`idproducto`, `idusuario`)
        VALUES('$idproducto','$idusuario')";
        return ejecutarConsulta($sql);
        if(isset($sql)){
			$result["exito"] = "1";
			$result["message"] = "exito";
		 echo json_encode($result);
	  	}
   }
}


?>