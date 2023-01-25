<?php
/* 	*********************************
		Funciones Android
    ********************************* */
require "../config/Conexion.php";

class LibroReclamaciones{
    public function __construct(){

    }
    public function listarDistritos(){
		$sql="SELECT id, descripcion FROM distritos GROUP BY descripcion asc;";
		return ejecutarConsulta($sql);		
    }
    public function listarTiendas(){
		$sql="SELECT idstore, nomtienda,  directienda, id   FROM tiendas ORDER BY nomtienda ASC;";
		return ejecutarConsulta($sql);		
    }
    public function listarZonas($iddistrito){
		$sql="SELECT id, nomzona, iddistrito  FROM zonas WHERE iddistrito='$iddistrito' GROUP BY nomzona asc;";

		return ejecutarConsulta($sql);		
    }
    public function listarPrecio($idzona){
		$sql="SELECT zonas.id, zonas.nomzona, preciodelivery.precio, preciodelivery.id AS idprecio FROM zonas INNER JOIN preciodelivery ON preciodelivery.idzona = zonas.id WHERE zonas.id='$idzona'";

		return ejecutarConsulta($sql);		
    }
    public function insertar($idusuario,$idstore,$iddistrito, $idzona, $direccion,$delivery,$selected){
		$sql="INSERT INTO `direcuser` (`idusuario`, `idstore`, `iddistrito`, `idzona`, `direccion`, `delivery`, `selected`) VALUES ( '$idusuario', '$idstore', '$iddistrito', '$idzona', '$direccion', '$delivery', '$selected');";
		return ejecutarConsulta($sql);		
    }
    public function dataCustomer($idusuario)
    { 
        $sql="SELECT
        idusuario,
        dniusuario,
        nomusuario,
        sexousuario,
        telusuario,
        emailusuario,
        dirusuario,
        claveusuario,
        condicionusuario,
        imagenusuario,
        idtienda,
        idperfil FROM sb_usuarios WHERE idusuario='$idusuario'";
        return  ejecutarConsulta($sql);
    } 
    public function desactivateadress($idusuario)
    { 
        $sql2="UPDATE `direcuser` SET  `selected`=0 WHERE idusuario='$idusuario'";
        return  ejecutarConsulta($sql2);
    }    
    public function listarIdStore($idusuario){
      $sql="SELECT direcuser.idusuario, direcuser.idstore  FROM direcuser WHERE idusuario ='$idusuario' LIMIT 1";
      return ejecutarConsulta($sql);		
    }
}
?>