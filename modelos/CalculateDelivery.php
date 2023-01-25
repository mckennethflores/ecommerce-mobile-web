<?php
/* 	*********************************
		Funciones Android
    ********************************* */
require "../config/Conexion.php";

class CalculateDelivery{
    public function __construct(){
      
    }
    public function listarDepartamento(){
		$sql="SELECT id, nomdepa as descripcion FROM departamento GROUP BY nomdepa asc;";
		return ejecutarConsulta($sql);		
    }
    public function listarDistritos($iddepartamento){
		$sql="SELECT id, descripcion, idprovincia  FROM distritos WHERE idprovincia='1' GROUP BY descripcion asc;";
		return ejecutarConsulta($sql);		
    }
    /* Este codigo se utilizo antes de agregar al aplicativo la provincia de piura */
   /*  public function listarDistritos(){
		$sql="SELECT id, descripcion FROM distritos GROUP BY descripcion asc;";
		return ejecutarConsulta($sql);		
    } */
    public function listarZonas($iddistrito){
		$sql="SELECT id, nomzona, iddistrito  FROM zonas WHERE iddistrito='$iddistrito' GROUP BY nomzona asc;";
		return ejecutarConsulta($sql);		
    }
    public function listarPrecio($idzona){
		$sql="SELECT zonas.id, zonas.nomzona, preciodelivery.precio, preciodelivery.id AS idprecio FROM zonas INNER JOIN preciodelivery ON preciodelivery.idzona = zonas.id WHERE zonas.id='$idzona'";

		return ejecutarConsulta($sql);		
    }
    public function insertar($idusuario,$idstore,$iddepartamento,$iddistrito, $idzona, $direccion,$delivery,$selected){
		$sql="INSERT INTO `direcuser` (`idusuario`, `idstore`, `iddepartamento`, `iddistrito`, `idzona`, `direccion`, `delivery`, `selected`) VALUES ( '$idusuario', '$idstore', '$iddepartamento', '$iddistrito', '$idzona', '$direccion', '$delivery', '$selected');";
		return ejecutarConsulta($sql);		
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