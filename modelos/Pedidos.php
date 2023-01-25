<?php
require "../config/Conexion.php";

class Pedidos{

    public function __construct(){

    }
    public function mostrar($idpedido){
        $sql="SELECT * FROM pedidos WHERE idpedido='$idpedido'";
        return ejecutarConsultaSimpleFila($sql);
    }
   
    public function editar($idpedido,$idestadopedido){
        $sql="UPDATE pedidos SET idestadopedido='$idestadopedido' WHERE idpedido='$idpedido'";
        return ejecutarConsulta($sql);
    }
    public function listarpedidos($idtienda)
	{
		$sql="SELECT
        pedidos.idpedido,
        pedidos.idusuario,
        sb_usuarios.nomusuario,
        productoestado.nomproductoestado AS estado,
        sb_usuarios.telusuario,
        sb_usuarios.emailusuario,
        pedidos.fechapedido,
        pedidos.total AS subtotal,
        pedidos.tipodepago,
        pedidos.recojoen,
        pedidos.pagacon,
        pedidos.idstore,
        pedidos.subtotal AS total,
        pedidos.delivery,
        pedidos.codigopedido
        FROM pedidos INNER JOIN sb_usuarios ON sb_usuarios.idusuario = pedidos.idusuario INNER JOIN productoestado ON productoestado.idproductoestado = pedidos.idestadopedido        
        WHERE pedidos.idstore= '$idtienda'";
		return ejecutarConsulta($sql);		
    }
    public function listarpedidosgeneral()
	{
		$sql="SELECT
        pedidos.idpedido,
        pedidos.codigopedido,
        pedidos.idusuario,
        sb_usuarios.nomusuario,
        productoestado.nomproductoestado AS estado,
        sb_usuarios.telusuario,
        sb_usuarios.emailusuario,
        pedidos.fechapedido,
        pedidos.total AS subtotal,
        pedidos.tipodepago,
        pedidos.recojoen,
        pedidos.pagacon,
        pedidos.idstore AS codigotienda,
        pedidos.subtotal AS total,
        pedidos.delivery,
        tiendas.nomtienda,
        tiendas.directienda
        FROM
        pedidos
        INNER JOIN sb_usuarios ON sb_usuarios.idusuario = pedidos.idusuario
        INNER JOIN productoestado ON productoestado.idproductoestado = pedidos.idestadopedido
        INNER JOIN tiendas ON tiendas.idstore = pedidos.idstore
        WHERE pedidos.idpedido > 0
        GROUP BY
        pedidos.idpedido
        ORDER BY
        pedidos.idpedido DESC";
		return ejecutarConsulta($sql);		
    }
    public function listarpedidosgeneralSuccessful()
	{
		$sql="SELECT
        pedidos.idpedido,
        pedidos.codigopedido,
        pedidos.idusuario,
        sb_usuarios.nomusuario,
        productoestado.nomproductoestado AS estado,
        sb_usuarios.telusuario,
        sb_usuarios.emailusuario,
        pedidos.fechapedido,
        pedidos.total AS subtotal,
        pedidos.tipodepago,
        pedidos.recojoen,
        pedidos.pagacon,
        pedidos.idstore,
        pedidos.subtotal AS total,
        pedidos.delivery
        FROM pedidos INNER JOIN sb_usuarios ON sb_usuarios.idusuario = pedidos.idusuario INNER JOIN productoestado ON productoestado.idproductoestado = pedidos.idestadopedido        
        WHERE pedidos.idpedido > 0 AND nomproductoestado='Finalizado' GROUP by idpedido ORDER by idpedido DESC";
		return ejecutarConsulta($sql);		
    }
    public function listarpedidosentregados()
	{
		$sql="SELECT
        pedidos.idpedido,
        pedidos.idusuario,
        sb_usuarios.nomusuario,
        productoestado.nomproductoestado AS estado,
        sb_usuarios.telusuario,
        sb_usuarios.emailusuario,
        pedidos.fechapedido,
        pedidos.total AS subtotal,
        pedidos.tipodepago,
        pedidos.recojoen,
        pedidos.pagacon,
        pedidos.idstore,
        pedidos.subtotal AS total,
        pedidos.delivery
        FROM pedidos INNER JOIN sb_usuarios ON sb_usuarios.idusuario = pedidos.idusuario INNER JOIN productoestado ON productoestado.idproductoestado = pedidos.idestadopedido        
        WHERE productoestado.nomproductoestado = 'Entregado' GROUP by idpedido ORDER by idpedido DESC";
		return ejecutarConsulta($sql);		
    }
    public function listarpedidos_delivery($idusuario)
	{
		$sql="SELECT
        pedidos.idpedido,
        sb_usuarios.nomusuario,
        productoestado.nomproductoestado AS estado,
        sb_usuarios.telusuario,
        sb_usuarios.emailusuario,
        pedidos.fechapedido,
        pedidos.total AS subtotal,
        pedidos.tipodepago,
        pedidos.recojoen,
        pedidos.pagacon,
        pedidos.idstore,
        pedidos.subtotal AS total,
        pedidos.delivery,
        pedidos.idusuario
        FROM pedidos INNER JOIN sb_usuarios ON sb_usuarios.idusuario = pedidos.idusuario INNER JOIN productoestado ON productoestado.idproductoestado = pedidos.idestadopedido
        WHERE pedidos.idusuario = '$idusuario'  GROUP BY pedidos.idpedido DESC limit 1";
		return ejecutarConsulta($sql);		
    }    
    public function mostrardetallepedido($idpedido){
		$sql="SELECT
        pedidos.idpedido,
        lineaspedido.idlineaspedido,
        producto.idproducto AS idproducto,
        producto.imagen AS imagenproducto,
        lineaspedido.unidadeslineaspedido,
        lineaspedido.preciolineaspedido,
        producto.nomproductocorto AS nombreproductocorto
        FROM lineaspedido INNER JOIN pedidos ON pedidos.idpedido = lineaspedido.idpedidolineaspedido INNER JOIN producto ON producto.IdProducto = lineaspedido.idproductolineaspedido
        WHERE idpedido='$idpedido'";
		return ejecutarConsulta($sql);
	}
  
	public function pedidocabecera($idpedido){
		$sql="SELECT
        pedidos.idpedido,
        pedidos.idusuario,
        pedidos.idestadopedido,
        sb_usuarios.nomusuario AS cliente,
        sb_usuarios.dirusuario,
        sb_usuarios.dniusuario AS num_documento,
        sb_usuarios.emailusuario,
        sb_usuarios.telusuario,
        pedidos.fechapedido AS fecha,
        DATE_FORMAT(pedidos.fechapedido, '%d-%m-%Y %H:%i') AS fecha_,
        pedidos.total AS total,
        pedidos.pagacon,
        pedidos.recojoen AS formadeentrega,
        tiendas.nomtienda,
        tiendas.directienda,
        distritos.descripcion,
        pedidos.delivery AS delivery,
        pedidos.tipodepago AS metodopago
        FROM
                pedidos
                INNER JOIN sb_usuarios ON sb_usuarios.idusuario = pedidos.idusuario
                INNER JOIN tiendas ON tiendas.idstore = pedidos.idstore
                INNER JOIN distritos ON distritos.id = tiendas.iddistrito
        WHERE pedidos.idpedido = '$idpedido'";
		return ejecutarConsulta($sql);
	}

    public function selectDireccion($idusuario){
		$sql="SELECT
        sb_usuarios.idusuario AS idusuario,
        direcuser.direccion AS direccionusuario,
        distritos.descripcion AS distrito,
        zonas.nomzona,
        departamento.nomdepa
        FROM
        direcuser
        INNER JOIN sb_usuarios ON direcuser.idusuario = sb_usuarios.idusuario
        INNER JOIN distritos ON distritos.id = direcuser.iddistrito
        INNER JOIN zonas ON zonas.id = direcuser.idzona
        INNER JOIN departamento ON departamento.id = direcuser.iddepartamento
        WHERE direcuser.selected=1 AND sb_usuarios.idusuario ='$idusuario'";
		return ejecutarConsulta($sql);
    }

	public function pedidodetalle($idpedido){
		$sql="SELECT producto.nomproductocorto as articulo, producto.codigobarra as codigobarra,
		lineaspedido.unidadeslineaspedido as cantidad,
		lineaspedido.preciolineaspedido,(lineaspedido.unidadeslineaspedido*lineaspedido.preciolineaspedido) as subtotal FROM lineaspedido INNER JOIN producto ON producto.idproducto = lineaspedido.idproductolineaspedido WHERE lineaspedido.idpedidolineaspedido = '$idpedido'";
		return ejecutarConsulta($sql);
	}
}
?>