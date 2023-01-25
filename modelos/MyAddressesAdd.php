<?php
/* 	*********************************
		Funciones Android
    ********************************* */
require "../config/Conexion.php";

class MyAddressesAdd{

    public function __construct(){

    }
    public function insertar($idusuario,$iddistrito,$direccion, $calle, $piso, $selected){
        $sql="INSERT INTO `direcuser` (`idusuario`, `iddistrito`, `direccion`, `calle`, `pisodepa`, `selected`) VALUES ( '$idusuario', '$iddistrito', '$direccion', '$calle', '$piso', '$selected');";
		return ejecutarConsulta($sql);
 
    }
    public function listarDistritos()
	{
		$sql="SELECT id, descripcion FROM distritos GROUP BY descripcion asc;";
		return ejecutarConsulta($sql);		
    }     

}


?>