<?php
$idstore= $_GET['idt'];
 header('Access-Control-Allow-Origin: *');
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
 header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
 require "config/Conexion.php";
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://tienda.tubazar.com.pe/appmovil/_sqlsrv/service/apiProductos.php?op=productostienda&idt=$idstore",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$response = json_decode($response, true); //because of true, it's in an array
//echo 'Resultado: '. $response['codigobarra'];
//var_dump($response);

foreach($response as $item) {
  //datos que estoy obteniendo desde el api
  $stock = $item['stock'];
  $stock_int =  number_format($stock);
  $codigobarra = $item['codigobarra'];
  $valorventa = $item['precioventa'];
// echo $stock_int."<br/>";
$sql1 = "SELECT
	producto.idproducto AS idproducto,
	producto.codigobarra AS codigobarra,
	producto.nomproductocorto,
	producto.valorventa AS valorventa,
	unidadmedida.codunidadmedida AS codunidadmedida,
	marca.descripcion AS marca,
	detalle_stock.stock AS stock,
	producto.imagen AS imagen,
	detalle_stock.idtienda
FROM
	detalle_stock
INNER JOIN producto ON producto.idproducto = detalle_stock.idproducto
INNER JOIN tiendas ON tiendas.idstore = detalle_stock.idtienda
INNER JOIN unidadmedida ON unidadmedida.idunidadmedida = producto.idunidadmedida
INNER JOIN marca ON marca.id = producto.idmarca
WHERE idstore='$idstore' AND codigobarra='$codigobarra';";
$rspta=ejecutarConsulta($sql1);
while ($row = $rspta->fetch_assoc())
{
    $idproducto = $row["idproducto"];
    $idtienda = $row["idtienda"];
$sql2="UPDATE detalle_stock SET stock='$stock_int' WHERE idproducto='$idproducto' AND idtienda='$idtienda'";
ejecutarConsulta($sql2);
$sql3="UPDATE producto SET valorventa='$valorventa' WHERE codigobarra='$codigobarra'";
ejecutarConsulta($sql3);
}
}