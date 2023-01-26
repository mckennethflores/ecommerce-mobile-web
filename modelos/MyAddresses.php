<?php
/* 	*********************************
		Funciones Android
    ********************************* */
    
require "../config/Conexion.php";

class MyAddresses{

    public function __construct(){

    }

    public function listarDireccionesUsuario($idusuario)
    {
    $sql="SELECT
	direcuser.iddirecuser, 
	direcuser.idusuario, 
	direcuser.iddistrito, 
	distritos.descripcion AS distrito, 
	direcuser.direccion, 
	direcuser.selected, 
	zonas.nomzona, 
	direcuser.delivery, 
	direcuser.iddepartamento
FROM
	direcuser
	INNER JOIN
	distritos
	ON 
		distritos.id = direcuser.iddistrito
	INNER JOIN
	zonas
	ON 
		zonas.id = direcuser.idzona
    WHERE idusuario = '$idusuario'";
    return ejecutarConsulta($sql);
    }
    public function actualizardireccion($idusuario,$iddirecuser,$iddistrito_destino)
    { 
        $sql="UPDATE `direcuser` SET  `selected`=1 WHERE idusuario='$idusuario' and iddirecuser='$iddirecuser';";
        ejecutarConsulta($sql);
        unset($_SESSION['iddistrito_destino']);
        return $_SESSION['iddistrito_destino']=$iddistrito_destino;

    }
    public function activateadress($idusuario,$iddirecuser)
    { 
        $sql2="UPDATE `direcuser` SET  `selected`=0 WHERE idusuario='$idusuario' and iddirecuser!='$iddirecuser';";
        return  ejecutarConsulta($sql2);
    }
}


?>