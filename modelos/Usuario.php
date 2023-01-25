<?php
require "../config/Conexion.php";

class Usuario{

    public function __construct(){

    }

    public function insertar($dniusuario, $nomusuario, $sexousuario, $telusuario,$emailusuario,$dirusuario,$claveusuario,$imagenusuario,$permisos,$idtienda,$idperfil){
        $sql="INSERT INTO sb_usuarios (`dniusuario`, `nomusuario`, `sexousuario`, `telusuario`,`emailusuario`,`dirusuario`,`claveusuario`,`condicionusuario`,`imagenusuario`,`idtienda`,`idperfil`) 
		VALUES('$dniusuario','$nomusuario','$sexousuario','$telusuario','$emailusuario','$dirusuario','$claveusuario','1','$imagenusuario','$idtienda','$idperfil')";
		
		$idusuarionew=ejecutarConsulta_retornarID($sql);
		$num_elementos=0;
		$sw=true;

		while ($num_elementos < count($permisos))
		{
			$sql_detalle = "INSERT INTO usuario_permiso(idusuario, idpermiso) VALUES('$idusuarionew', '$permisos[$num_elementos]')";
			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}

		return $sw;
    }
	
	//Eliminamos todos los permisos asignados para volverlos a registrar
    public function editar($idusuario,$dniusuario, $nomusuario, $sexousuario, $telusuario,$emailusuario,$dirusuario,$claveusuario,$imagenusuario,$permisos,$idtienda,$idperfil){
        $sql="UPDATE sb_usuarios SET dniusuario='$dniusuario',nomusuario='$nomusuario',sexousuario='$sexousuario',telusuario='$telusuario',emailusuario='$emailusuario',
        dirusuario='$dirusuario',claveusuario='$claveusuario',imagenusuario='$imagenusuario',idtienda='$idtienda',idperfil='$idperfil' WHERE idusuario='$idusuario'";
		ejecutarConsulta($sql);

		$sqldel="DELETE FROM usuario_permiso WHERE idusuario='$idusuario'";
		ejecutarConsulta($sqldel);

		$num_elementos=0;
		$sw=true;

		while ($num_elementos < count($permisos))
		{
			$sql_detalle = "INSERT INTO usuario_permiso(idusuario, idpermiso) VALUES('$idusuario', '$permisos[$num_elementos]')";
			ejecutarConsulta($sql_detalle) or $sw = false;
			$num_elementos=$num_elementos + 1;
		}

		return $sw;
    }
    public function desactivar($idusuario){
        $sql="UPDATE sb_usuarios SET condicionusuario='0' WHERE idusuario='$idusuario'";
        return ejecutarConsulta($sql);
    }
    public function activar($idusuario){
        $sql="UPDATE sb_usuarios SET condicionusuario='1' WHERE idusuario='$idusuario'";
        return ejecutarConsulta($sql);
    }
    public function mostrar($idusuario){
        $sql="SELECT * FROM sb_usuarios WHERE idusuario='$idusuario'";
        return ejecutarConsultaSimpleFila($sql);
    }
    public function mostrar2($idusuario){
        $sql="SELECT
		sb_usuarios.idusuario,
		sb_usuarios.dniusuario,
		sb_usuarios.nomusuario,
		sb_usuarios.sexousuario,
		sb_usuarios.telusuario,
		sb_usuarios.emailusuario,
		sb_usuarios.dirusuario,
		sb_usuarios.claveusuario,
		sb_usuarios.condicionusuario,
		sb_usuarios.imagenusuario,
		sb_usuarios.idtienda,
		sb_usuarios.idperfil
		FROM
		sb_usuarios
		 WHERE idusuario='$idusuario' limit 1";
        return ejecutarConsulta($sql);
    }
    public function listar(){
		$sql="SELECT * FROM sb_usuarios";
		return ejecutarConsulta($sql);		
    }   
	public function listarmarcados($idusuario){
		$sql="SELECT * FROM usuario_permiso WHERE idusuario='$idusuario'";
		return ejecutarConsulta($sql);
	}

	//Función para verificar el acceso al sistema
	public function verificar($dniusuario,$claveusuario,$idtienda)
    {
    	$sql="SELECT idusuario,	dniusuario,	nomusuario,	sexousuario,telusuario,	emailusuario,dirusuario,claveusuario,condicionusuario,imagenusuario,idtienda FROM sb_usuarios WHERE dniusuario='$dniusuario' AND claveusuario='$claveusuario' AND idtienda='$idtienda' AND idperfil='6' AND condicionusuario='1'"; 
    	return ejecutarConsulta($sql);  
	}
	
	public function mostrardetalleperfil($idusuario){
        $sql="SELECT * FROM sb_usuarios WHERE idusuario='$idusuario'";
        $rspta=ejecutarConsultaSimpleFila($sql);
        $result = array();
        $result['read'] = array();

        array_push($result["read"], $rspta);
        $result["success"] = "1";
        echo json_encode($result);
   }	
	public function editarperfil($idusuario,$nomusuario,$dniusuario){
        $sql="UPDATE sb_usuarios SET nomusuario='$nomusuario', dniusuario='$dniusuario' WHERE idusuario='$idusuario'";
        ejecutarConsulta($sql);
		if(isset($sql)){
                
			$result["success"] = "1";
			$result["message"] = "success";
	
		 echo json_encode($result);

		}
		else{
			$result["success"] = "0";
			$result["message"] = "error";			  
		}
   }	
   public function subir($idusuario,$imagenusuario){
	
	$path = DOCUMENT_PATH_PROJECT.$idusuario.".jpg";
	$filePath = URL_PAGE.$path;
	$sql="UPDATE sb_usuarios SET imagenusuario='$filePath' WHERE idusuario='$idusuario'";
	ejecutarConsulta($sql);
		if(isset($sql)){
			file_put_contents($path, base64_decode($imagenusuario));
				$result["success"] = "1";
				$result["message"] = "success";
			echo json_encode($result);
		}
	
	}
    public function listarSexousuario()
	{
		$sql="SELECT sb_aux.id,	sb_aux.v AS descripcion	FROM	sb_aux	WHERE t = 'sexo'";
		return ejecutarConsulta($sql);		
    }  
    public function listarPerfilUsuario()
	{
		$sql="SELECT
		sb_aux.id,
		sb_aux.v AS descripcion	FROM	sb_aux	WHERE	t = 'perfil'";
		return ejecutarConsulta($sql);		
	}  

/* 	*********************************
		Funciones Android
	********************************* */
    public function registrousuarioandroid($dniusuario, $nomusuario, $sexousuario, $telusuario,$emailusuario,$dirusuario,$claveusuario,$imagenusuario,$idtienda,$idperfil){

		$sql2="SELECT * FROM sb_usuarios WHERE dniusuario LIKE $dniusuario";
		$variable = ejecutarConsultaSimpleFila($sql2);
		$variable ? 'Yes' : 'No';
		if(isset($variable)){
					
			$result2["success"] = "2";
			$result2["message"] = "existeusuario";
		
			echo json_encode($result2);
		 exit;
		}
		$sql3="SELECT * FROM sb_usuarios WHERE emailusuario LIKE '$emailusuario'";
		$variable2 = ejecutarConsultaSimpleFila($sql3);
		if($variable2){
					
			$result3["success"] = "3";
			$result3["message"] = "existeemail";
		
			echo json_encode($result3);
		 exit;
		}
/* 		Habilitar para producción */
//		$enviaremail=enviarmensaje($emailusuario,$dniusuario,$claveusuario);
		$clavehash=hash("SHA256",$claveusuario);
        $sql="INSERT INTO sb_usuarios (`dniusuario`, `nomusuario`, `sexousuario`, `telusuario`,`emailusuario`,`dirusuario`,`claveusuario`,`condicionusuario`,`imagenusuario`,`idperfil`,`idtienda`) 
		VALUES('$dniusuario','$nomusuario','$sexousuario','$telusuario','$emailusuario','$dirusuario','$clavehash','1','$imagenusuario','$idperfil','$idtienda')";
		ejecutarConsulta($sql);
		if(isset($sql)){
                
			$result["success"] = "1";
			$result["message"] = "success";
	
		 echo json_encode($result);
	  	}
	}

	public function verificarandroid($dniusuario,$claveusuario)
    {
		// $clavehash=hash("SHA256",$claveusuario);
    	$sql="SELECT idusuario,	dniusuario,	nomusuario,	sexousuario,telusuario,	emailusuario,dirusuario,claveusuario,condicionusuario,imagenusuario,idtienda FROM sb_usuarios WHERE dniusuario='$dniusuario' AND claveusuario='$claveusuario' AND condicionusuario='1' AND idperfil=5"; 
    	return ejecutarConsulta($sql);
	}
	public function updateuserandroid($idusuario,$nomusuario,$telusuario){
        $sql="UPDATE sb_usuarios SET 
		nomusuario='$nomusuario',
		telusuario='$telusuario'
		 WHERE idusuario='$idusuario'";

		// echo $sql; return;
        return ejecutarConsulta($sql);
    }
	public function changepasswordandroid($idusuario,$nuevaclaveusuario){
        $sql="UPDATE sb_usuarios SET 
		claveusuario='$nuevaclaveusuario'
		 WHERE idusuario='$idusuario'";
		return ejecutarConsulta($sql);
    }
	public function saveparticipantraffle($idusuario,$prefijo_tienda,$codigo_tienda,$nombres,$dni,$telefono){

        $sql="INSERT INTO rifausuario (`idusuario`, `prefijo_tienda`, `codigo_tienda`, `nombres`,`dni`,`telefono`) VALUES('$idusuario','$prefijo_tienda','$codigo_tienda','$nombres','$dni','$telefono')";
		return ejecutarConsulta($sql);
	}    
}
?>