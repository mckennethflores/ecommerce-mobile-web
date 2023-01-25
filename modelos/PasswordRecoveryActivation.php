<?php
require "../config/Conexion.php";

class PasswordRecoveryActivation{

    public function __construct(){

    }

/* 	*********************************
		Funciones Android
    ********************************* */

    public function verifyCode($idusuario,$tokenusuario){

		$sql="SELECT * FROM sb_usuarios WHERE tokenusuario LIKE '$tokenusuario' AND idusuario='$idusuario'";
		return ejecutarConsulta($sql);
    }

}
?>