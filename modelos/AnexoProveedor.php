<?php
require "../config/Conexion.php";

class AnexoProveedor{

    public function __construct(){

    }
	public function select()
	{
		$sql="SELECT * FROM anexo";
		return ejecutarConsulta($sql);		
	}

}


?>