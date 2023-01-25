<?php
require "../config/Conexion.php";

class ProductoEstado{

    public function __construct(){

    }
    
	public function select()
	{
		$sql="SELECT * FROM productoestado";
		return ejecutarConsulta($sql);		
	}

}


?>