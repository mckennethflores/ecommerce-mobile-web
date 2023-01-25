<?php
require "../config/Conexion.php";

class Linea{

    // Implementamos nuestro metodo constructor
    public function __construct(){

    }

    // Implementamos metodo para insertar registros
    public function insertar($nombre)
    {
        $sql="INSERT INTO linea (nomproductolinea, imagen, condicion) VALUES('$nombre','noimage.jpg','1')";
        return ejecutarConsulta($sql);
    }
    // Metodo para editar registros
    public function editar($idlinea,$nombre,$imagen)
    {
        $sql = "UPDATE linea SET nomproductolinea='$nombre', imagen='$imagen' WHERE idlinea='$idlinea'";
        return ejecutarConsulta($sql);
    }
    //Metodo para desactivar lineas
    public  function desactivar($idlinea)
    {
        $sql = "UPDATE linea SET condicion='0' WHERE idlinea='$idlinea'";
        return ejecutarConsulta($sql);
    }
    //Metodo para activar lineas
    public  function activar($idlinea)
    {
        $sql = "UPDATE linea SET condicion='1' WHERE idlinea='$idlinea'";
        return ejecutarConsulta($sql);
    }
    // El metodo muestra los datos de un registro a modificar
    public function mostrar($idlinea)
    {
        $sql="SELECT * FROM linea WHERE idproductolinea='$idlinea'";
        return ejecutarConsultaSimpleFila($sql);
    }
    // Metodo para listar los registros
    public function listar()
    {
        $sql="SELECT * FROM linea GROUP BY nomproductolinea asc;";
        return ejecutarConsulta($sql);
    }
}
?>