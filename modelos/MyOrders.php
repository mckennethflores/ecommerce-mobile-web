<?php
/* 	*********************************
		Funciones Android
    ********************************* */
   
require "../config/Conexion.php";
 
class MyOrders{

    public function __construct(){

    }

    public function listarOrders($idusuario)
    {
        $sql="SELECT
        pedidos.idpedido,
        pedidos.codigopedido,
        pedidos.idestadopedido,
        distritos.descripcion AS distrito,
        direcuser.direccion,
        pedidos.fechapedido,
        DATE_FORMAT( pedidos.fechapedido, '%d-%m-%Y %H:%i' ) AS fechapedido_,
        pedidos.total,
        direcuser.selected,
        pedidos.idusuario,
        sb_usuarios.nomusuario,
        sb_usuarios.emailusuario FROM pedidos INNER JOIN sb_usuarios ON sb_usuarios.idusuario = pedidos.idusuario INNER JOIN direcuser ON sb_usuarios.idusuario = direcuser.idusuario INNER JOIN distritos ON distritos.id = direcuser.iddistrito WHERE selected=1 AND pedidos.idusuario ='$idusuario'";
        return ejecutarConsulta($sql);		
    }
}


?>