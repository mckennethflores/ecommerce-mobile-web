<?php
error_reporting(0);
define("DB_HOST","localhost");
define("DB_NAME","elchullo_dbho2");
define("DB_USERNAME","elchullo_uho2");
define("DB_PASSWORD","20601579317");
define("DB_ENCODE","utf8");
define("PRO_NOMBRE","BAZAR CENTRAL");

$subCarpeta = "acmp/bce-v1.2/";
$host = "http://".$_SERVER["HTTP_HOST"]."/".$subCarpeta;
$documentPathProject = $_SERVER["DOCUMENT_ROOT"]."/".$subCarpeta;

define("URL_PAGE",$host);
define("DOCUMENT_PATH_PROJECT",$documentPathProject);


//URL EXTERNO
$subCarpeta2 = "appmovil/_sqlsrv/service/";
$host = "http://tienda.tubazar.com.pe/".$subCarpeta2;
define("URL_PAGE_SERVER_EXTERNAL",$host);

?>
