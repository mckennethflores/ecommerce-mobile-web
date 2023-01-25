<?php
require "../config/Conexion.php";

class UnidadMedida{

    public function __construct(){

    }

	public function select()
	{
		$sql="SELECT * FROM unidadmedida";
		return ejecutarConsulta($sql);		
	}    

}


?>