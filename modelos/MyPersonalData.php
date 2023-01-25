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
       distritos.descripcion as distrito,
       direcuser.direccion,
       direcuser.calle,
       direcuser.pisodepa,
       direcuser.selected
       FROM
       direcuser
       INNER JOIN distritos ON distritos.id = direcuser.iddistrito
       WHERE idusuario = '$idusuario'";
          

       return ejecutarConsulta($sql);		
    }
    public function actualizardireccion($idusuario,$iddirecuser,$iddistrito_destino)
    { 
        $sql="UPDATE `direcuser` SET  `selected`=1 WHERE idusuario='$idusuario' and iddirecuser='$iddirecuser';";
         ejecutarConsulta($sql);	
        $sql2="UPDATE `direcuser` SET  `selected`=0 WHERE idusuario='$idusuario' and iddirecuser!='$iddirecuser';";
        ejecutarConsulta($sql2);

        unset($_SESSION['iddistrito_destino']);
        return $_SESSION['iddistrito_destino']=$iddistrito_destino;
        
         
        
    }
}


?>