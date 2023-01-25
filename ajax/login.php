<?php
session_start();
require "../config/Conexion.php";
require_once "../modelos/login.php";

$opselected = $_GET["opselected"];
$value = "SELECCIONE";
$login = new Login();

switch ($_GET["op"]){
/*  Selecciono las tiendas */
        case "selectTiendas":

            $rspta = $login->listarTiendas();
            optionselected($opselected,$value);

            while ($reg = $rspta->fetch_object()){
                echo '<option value=' . $reg->idstore . '>' . $reg->nomtienda . '</option>';
            }
        break;
    }