<?php
require "../config/Conexion.php";

class Tiendas{

    public function __construct(){

    }

    public function listarTiendas(){
		$sql="SELECT * FROM tiendas";
		return ejecutarConsulta($sql);		
    }
    public function listartiendasDireccion(){
		$sql="SELECT * FROM tiendas";
		return ejecutarConsulta($sql);		
    }
    public function listartiendasDireccionWhere($idtienda){
		$sql="SELECT * FROM tiendas WHERE idstore='$idtienda'";
    return ejecutarConsulta($sql);
    }
/* 	*********************************
		Funciones Android
    ********************************* */
    public function insertartiendatemporal($idusuario,$idstore){

        $sql2="INSERT INTO tiendatemp (idusuario, idstore) 
        VALUES('$idusuario','$idstore')";
        return ejecutarConsulta($sql2);
    }
}


?>