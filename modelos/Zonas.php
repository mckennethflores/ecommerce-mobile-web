<?php
require "../config/Conexion.php";

class Zonas{

    public function __construct(){

    }
    public function listarDistritos(){
		$sql="SELECT id, descripcion FROM distritos GROUP BY descripcion asc;";
		return ejecutarConsulta($sql);		
    }    
    public function mostrar($id){
        $sql="SELECT * FROM zonas WHERE id='$id'";
        return ejecutarConsultaSimpleFila($sql);
    }
    public function listarzonas()
	{
		$sql="SELECT
        zonas.id,
        zonas.nomzona,
        distritos.descripcion AS distrito
    FROM
        zonas
    INNER JOIN distritos ON distritos.id = zonas.iddistrito";
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
		$sql="SELECT pedidos.idpedido, lineaspedido.idlineaspedido, producto.IdProducto as idproducto, producto.NomProducto as nombreproducto, producto.Imagen as imagenproducto, lineaspedido.unidadeslineaspedido, lineaspedido.preciolineaspedido FROM lineaspedido INNER JOIN pedidos ON pedidos.idpedido = lineaspedido.idpedidolineaspedido INNER JOIN producto ON producto.IdProducto = lineaspedido.idproductolineaspedido WHERE idpedido='$idpedido'";
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
        pedidos.recojoen,
        tiendas.nomtienda,
        tiendas.directienda,
        distritos.descripcion,
        pedidos.delivery as delivery
        FROM
        pedidos
        INNER JOIN sb_usuarios ON sb_usuarios.idusuario = pedidos.idusuario
        INNER JOIN tiendas ON tiendas.idstore = pedidos.idstore
        INNER JOIN distritos ON distritos.id = tiendas.iddistrito
         WHERE pedidos.idpedido = '$idpedido'";
		return ejecutarConsulta($sql);
	}

    public function selectDireccion($idusuario){
		$sql="SELECT sb_usuarios.idusuario as idusuario,
            direcuser.direccion as direccion,
            direcuser.calle as calle,
            direcuser.pisodepa as pisodepa FROM direcuser
            INNER JOIN sb_usuarios ON direcuser.idusuario = sb_usuarios.idusuario
            WHERE direcuser.selected=1 AND sb_usuarios.idusuario ='$idusuario'";
		return ejecutarConsulta($sql);
    }

	public function pedidodetalle($idpedido){
		$sql="SELECT producto.nomproducto as articulo, producto.codigobarra as codigobarra,
		lineaspedido.unidadeslineaspedido as cantidad,
		lineaspedido.preciolineaspedido,(lineaspedido.unidadeslineaspedido*lineaspedido.preciolineaspedido) as subtotal FROM lineaspedido INNER JOIN producto ON producto.idproducto = lineaspedido.idproductolineaspedido WHERE lineaspedido.idpedidolineaspedido = '$idpedido'";
		return ejecutarConsulta($sql);
	}
}
?>