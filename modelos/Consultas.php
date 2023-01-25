<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Consultas
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}
	public function totalPedidos()
	{
		$sql="SELECT COUNT(idpedido) AS totalPedidos FROM pedidos;";
		return ejecutarConsulta($sql);
    }
    
	public function totalVentas()
	{
		$sql="SELECT IFNULL(SUM(total),0) as total FROM pedidos WHERE idestadopedido=2;";
		return ejecutarConsulta($sql);
	}
}

?>