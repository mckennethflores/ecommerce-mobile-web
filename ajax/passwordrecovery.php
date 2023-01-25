<?php
session_start();
require_once "../modelos/PasswordRecovery.php";

$passwordrecovery = new PasswordRecovery();

$emailusuario=isset($_POST["emailusuario"])? limpiarCadena($_POST["emailusuario"]):"";

    switch($_GET["op"]){

        case 'verifyemail':
 
            if(!empty($_POST)){
                $rspta=$passwordrecovery->verifyEmail($emailusuario);
        
                $fetch=$rspta->fetch_object();
        
                if (isset($fetch))
                {
                    $passwordrecovery->passwordrecovery_setpassword($fetch->idusuario);
                    
                    $_SESSION['idusuario']=$fetch->idusuario;
                    $resultado = array();
                    $resultado["email"] = array();

                    array_push($resultado["email"],$fetch);
                    
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