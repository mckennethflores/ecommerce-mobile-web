<?php
require "../config/Conexion.php";

class Marca{

	// Implementamos nuestro metodo constructor
    public function __construct(){

    }

    // Implementamos metodo para insertar registros
    public function insertar($nombre)
    {
        $sql="INSERT INTO marca (descripcion,condicion) VALUES('$nombre','1')";
        return ejecutarConsulta($sql);
	}
    // Metodo para editar registros
    public function editar($idmarca,$nombre)
    {
        $sql = "UPDATE marca SET descripcion='$nombre' WHERE id='$idmarca'";
        return ejecutarConsulta($sql);
	}	
    //Metodo para desactivar lineas
    public  function desactivar($idmarca)
    {
        $sql = "UPDATE marca SET condicion='0' WHERE id='$idmarca'";
        return ejecutarConsulta($sql);
	}
    //Metodo para activar lineas
    public  function activar($idmarca)
    {
        $sql = "UPDATE marca SET condicion='1' WHERE id='$idmarca'";
        return ejecutarConsulta($sql);
    }
    // El metodo muestra los datos de un registro a modificar
    public function mostrar($idmarca)
    {
        $sql="SELECT * FROM marca WHERE id='$idmarca'";
        return ejecutarConsultaSimpleFila($sql);
	}
		
	public function select()
	{
		$sql="SELECT * FROM marca WHERE id > 0 GROUP BY descripcion asc;";
		return ejecutarConsulta($sql);
	}    

}


?>