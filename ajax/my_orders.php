<?php
ob_start();
session_start();
require_once "../modelos/MyOrders.php";

$myorders = new MyOrders();


switch ($_GET["op"]){

    case 'listarorders':
        $rspta=$myorders->listarOrders($idusuario);
        echo $rspta;
    break;
}