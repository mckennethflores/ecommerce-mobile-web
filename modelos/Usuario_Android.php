<?php
/* 	*********************************
		Funciones Android
    ********************************* */
require "../config/Conexion.php";

class Usuario_Android{

    public function __construct(){

    }

	//Función para verificar el acceso al sistema
	public function verificar($dniusuario,$claveusuario){
    	$sql="SELECT idusuario,	dniusuario,	nomusuario,	sexousuario,telusuario,	emailusuario,dirusuario,claveusuario,condicionusuario,imagenusuario FROM sb_usuarios WHERE dniusuario='$dniusuario' AND claveusuario='$claveusuario' AND condicionusuario='1'"; 
    	return ejecutarConsulta($sql);  
	}
	
    public function insertar($dniusuario, $nomusuario, $sexousuario, $telusuario,$emailusuario,$dirusuario){

		$clavegenerada=generarPassword("6");
		$claveencript=hash("SHA256",$clavegenerada);
		
		enviaremailregistro($nomusuario,$emailusuario,"Gracias por Registrarte","Tu Bazar","no-reply@tubazar.com.pe",$dniusuario,$clavegenerada);
        $sql="INSERT INTO sb_usuarios (`dniusuario`, `nomusuario`, `sexousuario`, `telusuario`,`emailusuario`,`dirusuario`,`claveusuario`,`condicionusuario`,`imagenusuario`,`idtienda`) 
        VALUES('$dniusuario','$nomusuario','$sexousuario','$telusuario','$emailusuario','$dirusuario','$claveencript','1','demo.jpg','1')";
		ejecutarConsulta($sql);
		if(isset($sql)){
                
			$result["exito"] = "1";
			$result["message"] = "exito";
	
		 echo json_encode($result);
	    }
    }
	
}


?>