<?php
/* 	*********************************
		Funciones Android
    ********************************* */
require "../config/Conexion.php";

class Linea_Android{

    public function __construct(){

    }

    public function listar()
    {
		$sql="SELECT p.IdProductoLinea as idproductolinea, p.NomProductoLinea as nomproductolinea, p.Imagen as imagenproductolinea FROM productolinea p";
		return ejecutarConsulta($sql);	
    }

    /**********************************
		Funciones Android
    **********************************/

    public function listCategoryLine(){
      $sql="SELECT
      idproductolinea,
      nomproductolinea,
      imagen,
      condicion, orden
      FROM
      linea WHERE idproductolinea > 0 and condicion > 0 GROUP BY idproductolinea DESC";
      return ejecutarConsulta($sql);
    }

}
?>