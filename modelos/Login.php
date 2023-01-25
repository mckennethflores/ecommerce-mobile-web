<?php
require "../config/Conexion.php";

class Login{

    public function __construct(){

    }

    public function listarTiendas()
	{
		$sql="SELECT * FROM tiendas";
		return ejecutarConsulta($sql);		
    }   

}


?>