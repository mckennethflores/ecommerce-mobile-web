<?php
/* 	*********************************
		Funciones Android
    ********************************* */
require "../config/Conexion.php";

class Producto_Android{

    public function __construct(){
      
    }
        //ACTUALIZAMOS TODOS LOS PRODUCTOS DE LA BASE DE DATOS EXTERNA
/*   public function actualizarStockBce($idstore){

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

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
    $sql1 = "SELECT producto.idproducto AS idproducto,
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
  }
  public function AddProductsToStore($idstore){

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

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
  } */

/*     LISTAR TODOS LOS PRODUCTOS CON UNIDAD MEDIDA, LINEA, SUBLINEA */
    public function listar()
	{
		$sql="SELECT
        p.idproducto AS idproducto,
        ps.nomproductosublinea,
        pl.nomproductolinea,
        um.nomunidadmedida,
        um.codunidadmedida,
        p.codproducto,
        p.nomproducto,
        p.nomproductocorto,
        p.codigobarra,
        p.imagen,
        p.imagengrande,
        pe.nomproductoestado,
        a.nomanexo,
        p.valorventa,
        p.observacion,
        p.preciopromocion,
        pe.idproductoestado,
        marca.descripcion AS marca,
        p.idanexo_proveedor,
        p.idproductoestado,
        marca.id AS idmarca
        FROM
        producto AS p
        INNER JOIN sublinea AS ps ON ps.idproductosublinea = p.idproductosublinea
        INNER JOIN linea AS pl ON pl.idproductolinea = ps.idproductolinea
        INNER JOIN unidadmedida AS um ON um.idunidadmedida = p.idunidadmedida
        INNER JOIN productoestado AS pe ON pe.idproductoestado = p.idproductoestado
        INNER JOIN anexo AS a ON a.idanexo = p.idanexo_proveedor
        INNER JOIN marca ON marca.id = p.idmarca";
		return ejecutarConsulta($sql);	
    }
  /*     VARIFICAR SI HAY UN USUARIO QUE TIENE DIRECCIÓN AÑADIDA */
  public function validaDireccion($idusuario)
  {
    $sql="SELECT
    direcuser.iddirecuser,
    direcuser.idusuario,
    direcuser.idstore,
    direcuser.iddistrito,
    direcuser.idzona,
    direcuser.direccion,
    direcuser.delivery,
    direcuser.selected
    FROM direcuser
    WHERE idusuario='$idusuario' AND iddistrito!='0'";
    return ejecutarConsulta($sql);
  }
  public function thereProductsTempAdded($idusuario)
  {
    $sql="SELECT
    paprotemp.idpaprotemp,
    paprotemp.idproducto,
    paprotemp.idusuario,
    paprotemp.precio,
    paprotemp.cantidad
    FROM
    paprotemp WHERE idusuario='$idusuario'";
    return ejecutarConsulta($sql);
  }

    public function deleteProductsTempAdded($idusuario){
		$sql="DELETE FROM paprotemp WHERE idusuario='$idusuario'";
		ejecutarConsulta($sql);
		$sql2="DELETE FROM tiendatemp WHERE idusuario='$idusuario'";
		return ejecutarConsulta($sql2);
    }
}
?>