<?php
session_start();
require_once "../modelos/Usuario.php";

$usuario = new Usuario();

$idusuario=isset($_POST["idusuario"])? limpiarCadena($_POST["idusuario"]):"";
$dniusuario=isset($_POST["dniusuario"])? limpiarCadena($_POST["dniusuario"]):"";
$nomusuario=isset($_POST["nomusuario"])? limpiarCadena($_POST["nomusuario"]):"";
$sexousuario=isset($_POST["sexousuario"])? limpiarCadena($_POST["sexousuario"]):"";
$telusuario=isset($_POST["telusuario"])? limpiarCadena($_POST["telusuario"]):"";
$emailusuario=isset($_POST["emailusuario"])? limpiarCadena($_POST["emailusuario"]):"";
$dirusuario=isset($_POST["dirusuario"])? limpiarCadena($_POST["dirusuario"]):"";
$claveusuario=isset($_POST["claveusuario"])? limpiarCadena($_POST["claveusuario"]):"";
$imagenusuario=isset($_POST["imagenusuario"])? limpiarCadena($_POST["imagenusuario"]):"";
$idtienda=isset($_POST["idtienda"])? limpiarCadena($_POST["idtienda"]):"";
$idperfil=isset($_POST["idperfil"])? limpiarCadena($_POST["idperfil"]):"";
$nuevaclaveusuario=isset($_POST["nuevaclaveusuario"])? limpiarCadena($_POST["nuevaclaveusuario"]):"";
// Datos del input Ventana Modal
//Guardar Participante Sorteo saveparticipantraffle
$prefijo_tienda=isset($_POST["prefijo_tienda_input"])? limpiarCadena($_POST["prefijo_tienda_input"]):"";
$codigo_tienda=isset($_POST["codigo_tienda_input"])? limpiarCadena($_POST["codigo_tienda_input"]):"";
$nombres=isset($_POST["nombres_input"])? limpiarCadena($_POST["nombres_input"]):"";
$dni=isset($_POST["dni_input"])? limpiarCadena($_POST["dni_input"]):"";
$telefono=isset($_POST["telefono_input"])? limpiarCadena($_POST["telefono_input"]):"";

    switch($_GET["op"]){
        case 'guardaryeditar':
            if (!file_exists($_FILES['imagenusuario']['tmp_name']) || !is_uploaded_file($_FILES['imagenusuario']['tmp_name']))
            {
                $imagenusuario=$_POST["imagenactual"];
            }
            else 
            {
                $ext = explode(".", $_FILES["imagenusuario"]["name"]);
                if ($_FILES['imagenusuario']['type'] == "image/jpg" || $_FILES['imagenusuario']['type'] == "image/jpeg" || $_FILES['imagenusuario']['type'] == "image/png")
                {
                    $imagenusuario = round(microtime(true)) . '.' . end($ext);
                    move_uploaded_file($_FILES["imagenusuario"]["tmp_name"], "../files/usuarios/" . $imagenusuario);
                }
            }

            $clavehash=hash("SHA256",$claveusuario);

            if(empty($idusuario)){
                $rspta=$usuario->insertar($dniusuario, $nomusuario, $sexousuario, $telusuario,$emailusuario,$dirusuario,$clavehash,$imagenusuario,$_POST['permiso'],$idtienda,$idperfil);
                echo $rspta ? "Usuario registrado": "No se pudieron registrar todos los datos del usuario";
            }else{
                $rspta=$usuario->editar($idusuario,$dniusuario, $nomusuario, $sexousuario, $telusuario,$emailusuario,$dirusuario,$clavehash,$imagenusuario,$_POST['permiso'],$idtienda,$idperfil);
                echo $rspta ? "Usuario actualizado": "El usuario no se puedo actualizar";
            }
        break;
        case 'desactivar';
                $rspta=$usuario->desactivar($idusuario);
                echo $rspta ? "Usuario desactivado": "El usuario no se puedo desactivar";
        break;
        case 'activar':
            $rspta=$usuario->activar($idusuario);
            echo $rspta ? "Usuario activado": "El usuario no se puedo activar";
        break;
        case 'mostrar':
            $rspta=$usuario->mostrar($idusuario);
            echo json_encode($rspta);
        break;
        case 'listar':
            $rspta=$usuario->listar();
            $data= Array();
            while ($reg=$rspta->fetch_object()){
                $rst ='';
                if($reg->idperfil=='6'){ $rst.='<span class="label bg-green">Empleado</span>'; }
                else if ($reg->idperfil=='5') { $rst.= '<span class="label bg-blue">Cliente</span>'; }
                $data[]=array(
                    "0"=>($reg->condicionusuario)?"<button class='btn btn-warning' onclick='mostrar(".$reg->idusuario.")'><i class='fa fa-pencil'></i></button>".
                    " <button class='btn btn-danger' onclick='desactivar(".$reg->idusuario.")'><i class='fa fa-close'></i></button>":
                    "<button class='btn btn-warning' onclick='mostrar(".$reg->idusuario.")'><i class='fa fa-pencil'></i></button>".
                    " <button class='btn btn-primary' onclick='activar(".$reg->idusuario.")'><i class='fa fa-check'></i></button>",
                    "1"=>$reg->dniusuario,
                    "2"=>$reg->nomusuario,
                    "3"=>($reg->condicionusuario)?'<span class="label bg-green">Activado</span>':
                    '<span class="label bg-blue">Desactivado</span>',
                    "4"=>$rst,
                    "5"=>"<img src='../files/usuarios/".$reg->imagenusuario."' height='50px' width='50px' >"
                );
            }
            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;
        //Permisos del administrador de la tienda
        case 'permisos':
            require_once "../modelos/Permiso.php";
            $permiso = new Permiso();
            $rspta = $permiso->listar();
            $id=$_GET['id'];
            $marcados = $usuario->listarmarcados($id);
            $valores=array();
            while ($per = $marcados->fetch_object())
                {
                    array_push($valores, $per->idpermiso);
                }
            while ($reg = $rspta->fetch_object()){
                    $sw=in_array($reg->idpermiso,$valores)?'checked':'';
                    echo '<li> <input type="checkbox" '.$sw.'  name="permiso[]" value="'.$reg->idpermiso.'">'.$reg->nombre.'</li>';
                }
        break;
        case 'verificar':
            $dniusuarioa=$_POST['dniusuarioa'];
            $claveusuarioa=$_POST['claveusuarioa'];
            $idtienda=$_POST['idtienda'];

            $clavehash=hash("SHA256",$claveusuarioa);

            $rspta=$usuario->verificar($dniusuarioa, $clavehash,$idtienda);
            $fetch=$rspta->fetch_object();
            if (isset($fetch))
            {
                $_SESSION['idusuario']=$fetch->idusuario;
                $_SESSION['nomusuario']=$fetch->nomusuario;
                $_SESSION['imagenusuario']=$fetch->imagenusuario;
                $_SESSION['dniusuario']=$fetch->dniusuario;
                $_SESSION['idtienda']=$fetch->idtienda;
                $marcados = $usuario->listarmarcados($fetch->idusuario);
			$valores=array();                
			while ($per = $marcados->fetch_object())
				{
					array_push($valores, $per->idpermiso);
                }
                in_array(1,$valores)?$_SESSION['usuarios']=1:$_SESSION['usuarios']=0;
                in_array(2,$valores)?$_SESSION['productos']=1:$_SESSION['productos']=0;
                in_array(3,$valores)?$_SESSION['pedidos']=1:$_SESSION['pedidos']=0;
                in_array(4,$valores)?$_SESSION['pedidosgeneral']=1:$_SESSION['pedidosgeneral']=0;
                in_array(5,$valores)?$_SESSION['zonas']=1:$_SESSION['zonas']=0;                       
            }
            echo json_encode($fetch);
        break;

        case 'salir':  
            session_unset();
            session_destroy();
            header("Location: ../index.php");
        break;

        case 'mostrardetalleperfil':
            
            if(!empty($_POST)){
                $idusuario=$_POST['idusuario'];
                $rspta=$usuario->mostrardetalleperfil($idusuario);
            }            
        break;
    
        case 'editarperfil':
            
            if(!empty($_POST)){
                $idusuario=$_POST['idusuario'];
                $nomusuario=$_POST['nomusuario'];
                $dniusuario=$_POST['dniusuario'];
                $rspta=$usuario->editarperfil($idusuario,$nomusuario,$dniusuario);
            }            
        break;

        case 'subir':
            if(!empty($_POST)){
                $idusuario=$_POST['idusuario'];
                $imagenusuario=$_POST['imagenusuario'];
                $rspta=$usuario->subir($idusuario,$imagenusuario);
            }          
        break;
        
        case 'selectSexousuario':
            $rspta = $usuario->listarSexousuario();
            while ($reg = $rspta->fetch_object()){
                        echo '<option value=' . $reg->id . '>' . $reg->descripcion . '</option>';
            }
        break;
        case 'selectPerfilUsuario':
            $rspta = $usuario->listarPerfilUsuario();
            while ($reg = $rspta->fetch_object()){
                        echo '<option value=' . $reg->id . '>' . $reg->descripcion . '</option>';
            }
        break;
        
/* 	*********************************
		Funciones Android
    ********************************* */
        case 'registrousuarioandroid':
            if(!empty($_POST)){
                $dniusuario=$_POST['dniusuario'];
                $nomusuario=$_POST['nomusuario'];
                //Tenia un error era que no estaba recibiendo nada
                $sexousuario="";
                $telusuario=$_POST['telusuario'];
                $emailusuario=$_POST['emailusuario'];
                $claveusuario=$_POST['claveusuario'];
               // $clavegenerada=generarPassword("6");
                echo  $rspta=$usuario->registrousuarioandroid($dniusuario, $nomusuario, $sexousuario, $telusuario,$emailusuario,"Lima",$claveusuario,"perfil_default.jpg","0","5");
            }
        break;
        
        case 'verificarandroid':
            if(!empty($_POST)){
                $dniusuario=$_POST['dniusuario'];
                $claveusuario=$_POST['claveusuario'];
                $rspta=$usuario->verificarandroid($dniusuario, $claveusuario);
        
                $fetch=$rspta->fetch_object();
                if (isset($fetch))
                {
                    $resultado = array();
                    $resultado["login"] = array();
                    array_push($resultado["login"],$fetch);
                    
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
        case 'verificarandroid_test':
 
            if(!empty($_POST)){
                $dniusuario=$_POST['dniusuario'];
                $claveusuario=$_POST['claveusuario'];
                $clavehash=hash("SHA256",$claveusuario);
                $rspta=$usuario->verificarandroid($dniusuario, $clavehash);
        
                $fetch=$rspta->fetch_object();
        
                if (isset($fetch))
                {
                    $resultado = array();
                    $resultado["login"] = array();

                     $_SESSION['idusuario']=$fetch->idusuario;
                   
                    array_push($resultado["login"],$fetch);
                    
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
        case 'updateuserandroid';
                $rspta=$usuario->updateuserandroid($idusuario,$nomusuario,$telusuario);

              //  echo $rspta; return;
                echo $rspta ? "Se actualizo los datos con exito": "El usuario no se pudo actualizar";
        break;
        case 'changepasswordandroid';
        $rspta=$usuario->changepasswordandroid($idusuario,$nuevaclaveusuario);
        echo $rspta ? "Se actualizo la nueva contraseña": "No se pudoactualizar la contraseña";
        break;
        
        case 'saveparticipantraffle';
        $rspta=$usuario->saveparticipantraffle($idusuario,$prefijo_tienda,$codigo_tienda,$nombres,$dni,$telefono);
        echo $rspta ? "Se registro satisfactoriamente para el sorteo": "No se pudo registrar para el sorteo";
        break;        
}