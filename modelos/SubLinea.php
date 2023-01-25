<?php
require "../config/Conexion.php";

class SubLinea{

	// Implementamos nuestro metodo constructor
    public function __construct(){
    }

	// Implementamos metodo para insertar registros
    public function insertar($idlinea,$nombre)
    {
        $sql="INSERT INTO sublinea (idproductolinea, nroproductosublinea, nomproductosublinea, imagenproductosublinea, condicion) VALUES('$idlinea','NRO','$nombre','noimage.jpg','1')";
        return ejecutarConsulta($sql);
	}
    // Metodo para editar registros
    public function editar($idsublinea,$idlinea,$nombre)
    {
        $sql = "UPDATE sublinea SET idproductolinea='$idlinea', nomproductosublinea='$nombre' WHERE idproductosublinea='$idsublinea'";
        return ejecutarConsulta($sql);
	}
    //Metodo para desactivar sublineas
    public function desactivar($idsublinea)
    {
        $sql = "UPDATE sublinea SET condicion='0' WHERE idproductosublinea='$idsublinea'";
        return ejecutarConsulta($sql);
	}	
   //Metodo para activar sublineas
   public  function activar($idsublinea)
   {
	   $sql = "UPDATE sublinea SET condicion='1' WHERE idproductosublinea='$idsublinea'";
	   return ejecutarConsulta($sql);
   }
   // El metodo muestra los datos de un registro a modificar
   public function mostrar($idsublinea)
   {
	   $sql="SELECT
       sublinea.idproductosublinea,
       linea.nomproductolinea,
       linea.imagen,
       linea.condicion,
       sublinea.idproductolinea,
       sublinea.nroproductosublinea,
       sublinea.nomproductosublinea,
       sublinea.imagenproductosublinea,
       sublinea.condicion
       FROM
       linea
       INNER JOIN sublinea ON sublinea.idproductolinea = linea.idproductolinea WHERE sublinea.idproductosublinea = '$idsublinea'";
	   return ejecutarConsultaSimpleFila($sql);
   }
   // Metodo para listar los registros
   public function listar()
   {
	   $sql="SELECT 
       idproductosublinea,
       nomproductosublinea, 
       nomproductolinea,
       sbl.condicion
       
   FROM
       sublinea sbl
   INNER JOIN linea l 
       ON sbl.idproductolinea = l.idproductolinea WHERE sbl.condicion = 1;";
	   return ejecutarConsulta($sql);
   }	
	public function select()
	{
		$sql="SELECT * FROM sublinea WHERE idproductosublinea > 0";
		return ejecutarConsulta($sql);
	}
	public function listSubLinea($idlinea)
	{
		$sql="SELECT
		sublinea.idproductosublinea,
		linea.idproductolinea,
		linea.nomproductolinea,
		sublinea.nomproductosublinea
		FROM sublinea
		INNER JOIN linea ON linea.idproductolinea = sublinea.idproductolinea WHERE linea.idproductolinea = '$idlinea' AND sublinea.condicion = 1 ";
		return ejecutarConsulta($sql);
	}

    public function listSubLineaSanValentin()
	{
		$sql="SELECT
		sublinea.idproductosublinea,
		linea.idproductolinea,
		linea.nomproductolinea,
		sublinea.nomproductosublinea
		FROM sublinea
		INNER JOIN linea ON linea.idproductolinea = sublinea.idproductolinea WHERE linea.idproductolinea = '4' OR linea.idproductolinea = '22' AND sublinea.condicion = 1 ";
		return ejecutarConsulta($sql);
	}
}


?>