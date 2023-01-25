<?php
require "../config/Conexion.php";

class SearchAndroid
{

    public function __construct(){

    }
 
    public function searchProduct($nomproduct,$idtienda){       
		$sql="SELECT
        linea.nomproductolinea,
        linea.imagen,
        sublinea.nomproductosublinea,
        sublinea.imagenproductosublinea,
        producto.idproducto,
        producto.idproductosublinea,
        producto.idunidadmedida,
        producto.nomproductocorto,
        producto.codigobarra,
        producto.imagen,
        producto.idproductoestado,
        producto.valorventa,
        producto.observacion,
        producto.idmarca,
        producto.preciopromocion,
        detalle_stock.stock,
        tiendas.idstore,
        tiendas.nomtienda,
        marca.descripcion as marca
        FROM
        linea
        INNER JOIN sublinea ON linea.idproductolinea = sublinea.idproductolinea
        INNER JOIN producto ON sublinea.idproductosublinea = producto.idproductosublinea
        INNER JOIN detalle_stock ON producto.idproducto = detalle_stock.idproducto
        INNER JOIN tiendas ON tiendas.idstore = detalle_stock.idtienda
        INNER JOIN marca ON producto.idmarca = marca.id WHERE nomproductocorto LIKE '%$nomproduct%' AND idstore = '$idtienda'";
		return ejecutarConsulta($sql);
    }
}
?>