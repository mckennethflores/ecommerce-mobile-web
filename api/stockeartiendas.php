<?php
$idstore= $_GET['idt'];
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
require "../config/Conexion.php";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://tienda.tubazar.com.pe/appmovil/_sqlsrv/service/apiProductos.php?op=productostienda&idt='$idstore'",
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
        
        $response = json_decode($response, true);
        //because of true, it's in an array
        //echo 'Resultado: '. $response['codigobarra'];
       // var_dump($response);
  
        foreach($response as $item) {
          //datos que estoy obteniendo desde el api
          $stock = $item['stock'];
          $stock_int =  number_format($stock);
          $codigobarra = $item['codigobarra'];
          $valorventa = $item['precioventa'];
        // echo $stock_int."<br/>";
       // $sql1 = "SELECT producto.idproducto as idproducto, producto.codigobarra as codigobarra, producto.nomproductocorto, producto.valorventa as valorventa, unidadmedida.codunidadmedida as codunidadmedida, marca.descripcion as marca, detalle_stock.stock as stock, producto.imagen as imagen, detalle_stock.idtienda FROM detalle_stock INNER JOIN producto ON producto.idproducto = detalle_stock.idproducto INNER JOIN tiendas ON tiendas.idstore = detalle_stock.idtienda INNER JOIN unidadmedida ON unidadmedida.idunidadmedida = producto.idunidadmedida INNER JOIN marca ON marca.id = producto.idmarca WHERE idtienda='$idstore' AND codigobarra='$codigobarra';";
       $sql1 = "SELECT
producto.idproducto,
producto.idproductosublinea,
producto.idunidadmedida,
producto.codproducto,
producto.nomproducto,
producto.nomproductocorto,
producto.codigobarra,
producto.imagen,
producto.imagengrande,
producto.idproductoestado,
producto.idanexo_proveedor,
producto.valorventa,
producto.observacion,
producto.idmarca,
producto.preciopromocion
FROM
producto WHERE codigobarra='$codigobarra'";
        $rspta=ejecutarConsulta($sql1);
          while ($row = $rspta->fetch_assoc())
          {
              $idproducto = $row["idproducto"];
              //$idtienda = $row["idtienda"];

              $sql77="INSERT INTO `detalle_stock` (`idproducto`, `idtienda`, `stock`) VALUES ('$idproducto', '$idstore', '-1');";
              ejecutarConsulta($sql77);
          }
        
        }
