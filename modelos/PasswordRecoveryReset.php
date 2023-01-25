<?php
require "../config/Conexion.php";

class PasswordRecoveryReset{

    public function __construct(){

    }

/* 	*********************************
		Funciones Android
    ********************************* */

    public function resetPass($idusuario,$nuevaclaveusuario){

        $sql="UPDATE sb_usuarios SET claveusuario='$nuevaclaveusuario' WHERE idusuario='$idusuario'";
		return ejecutarConsulta($sql);
    }   

}
?>