<?php
require "../config/Conexion.php";

class Permiso{

    public function __construct(){

    }

    public function listar()
	{
		$sql="SELECT * FROM Permiso";
		return ejecutarConsulta($sql);		
    }   


}


?>