<?php
require "../config/Conexion.php";

class PasswordRecovery{

    public function __construct(){

    }

/* 	*********************************
		Funciones Android
    ********************************* */

    public function verifyEmail($emailusuario){

		$sql="SELECT * FROM sb_usuarios WHERE emailusuario LIKE '$emailusuario'";
		return ejecutarConsulta($sql);
    }
    
    public function passwordrecovery_setpassword($idusuario){

      $tokenusuario = generateCode();
      $sql="UPDATE sb_usuarios SET tokenusuario='$tokenusuario' WHERE idusuario='$idusuario'";
      ejecutarConsulta($sql);

        $sql4="SELECT * FROM `sb_usuarios` WHERE idusuario = $idusuario";
        $customer=ejecutarConsulta($sql4);
        while ($reg=$customer->fetch_object()){
            $reg->emailusuario;
           passwordrecovery_message($reg->emailusuario,$tokenusuario);
        }
    }

}
?>