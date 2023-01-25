<?php
session_start();
require_once "../modelos/PasswordRecoveryActivation.php";

$passwordrecoveryactivation = new PasswordRecoveryActivation();

$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$tokenusuario=isset($_POST["tokenusuario"])? limpiarCadena($_POST["tokenusuario"]):"";

    switch($_GET["op"]){

        case 'verifycode':
 
            if(!empty($_POST)){
                $rspta=$passwordrecoveryactivation->verifyCode($idusuario,$tokenusuario);
        
                $fetch=$rspta->fetch_object();
        
                if (isset($fetch))
                {
                    $resultado = array();
                    $resultado["codeverified"] = array();

                    array_push($resultado["codeverified"],$fetch);
                    
                    $resultado["success"] = "1";
                    $resultado["message"] = "success";
                    echo json_encode($resultado);
    
                }else{
                    $resultado["success"] = "0";
                    $resultado["message"] = "error";
                    echo json_encode($resultado);
                }
        
            }

        break;
}