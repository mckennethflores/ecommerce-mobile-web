<?php
//$idstore= $_GET['idt'];
 header('Access-Control-Allow-Origin: *');
 header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
 header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
 require "config/Conexion.php";
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://tienda.tubazar.com.pe/appmovil/_sqlsrv/service/apiProductos.php?op=productostienda&idt='321320'",
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
// echo 'Resultado: '. $response['codigobarra'];
 var_dump($response);
return;
