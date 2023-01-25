<?php
/* error_reporting(0); */
define("DB_HOST","localhost");
define("DB_NAME","bazar");
define("DB_USERNAME","root");
define("DB_PASSWORD","");
define("DB_ENCODE","utf8");
define("PRO_NOMBRE","BAZAR CENTRAL");


const SPD = ".";
const SPM = ",";

const MONEY = "S/ ";

	//Datos envio de correo
	const EMAIL = "oswaldoelflori@gmail.com.com";
	const NOMBRE_REMITENTE = "Tienda Virtual";
	const EMAIL_REMITENTE = "no-reply@groenergy.com";
	const NOMBRE_EMPRESA = "MI EMPRESA S.A.C.";
	const RUC_EMPRESA = "20601579317";
	const DIRECCION_EMPRESA = "Miraflores, Parque kenedy 248";
	const WEB_EMPRESA = "www.frsystem.com.pe";

	const EMAIL_RECIBE = "oswaldoelflori@gmail.com";

	const CELULAR1 = "938222552";
	const CELULAR2 = "999991931";
	const PAIS = "+51";



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
