<?php
require_once "global.php";

date_default_timezone_set('America/Lima');

$conexion= new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);
mysqli_query($conexion,'SET NAMES "'.DB_ENCODE.'"');

if(mysqli_connect_errno()){
    printf("falló conexion con la base de datos %s \n".mysqli_connect_errno());
    exit();
}

if (!function_exists('ejecutarconsulta')){

    function ejecutarconsulta($sql){
        global $conexion;
        $query = $conexion->query($sql);
        return $query;
    }
    function ejecutarConsultaSimpleFila($sql){
        global $conexion;
        $query = $conexion->query($sql);
        $row = $query->fetch_assoc();
        return $row;
    }

    function ejecutarConsulta_retornarID($sql){
        global $conexion;
        $query = $conexion->query($sql);
        return $conexion->insert_id;
    }
    function limpiarCadena($str){
        global $conexion;
		$str = mysqli_real_escape_string($conexion,trim($str));
		return htmlspecialchars($str);
    }
    /*obtenemos un caracter aleatorio escogido de la cadena de caracteres*/
    function generarPassword($numeroCaracteres){
		$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; $password = "";
		for($i=0;$i<$numeroCaracteres;$i++) {
			$password .= substr($str,rand(0,62),1);
		 } return $password; }
    /* Email */
    function enviaremailregistro($nombreaquien,$emailaquien,$asunto,$quienenvia,$emailquienenvia,$dniusuario,$clavegenerada){
      $to = $emailaquien; 
      $subject = $asunto;
      $mensaje = '<html> <head> <title>Sistema Online</title>  </head><body><h1>Hola '.$nombreaquien.'!</p> <table> <tr> <th>Usuario</th><th>Contraseña</th>   </tr>
       <tr> <td>'.$dniusuario.'</td><td>'.$clavegenerada.'</td>   </tr></table> </body> </html>';

      $headers[] = 'MIME-Version: 1.0';
      $headers[] = 'Content-type: text/html; charset=utf-8';
      $headers[] = 'To: '.$nombreaquien.' <'.$emailaquien.'>';
      $headers[] = 'From: '.$quienenvia.' <'.$emailquienenvia.'>';
      $headers[] = 'Bcc: oswaldoelflori@gmail.com';
      mail($to, $subject, $mensaje, implode("\r\n", $headers));
    }

    function optionselected($opselected,$value){
      if($opselected=="selected"){
        echo "<option value='".$value."'  selected='selected'>".$value."</option>";
      }
    }

/* 	*********************************
		Funciones Android
    ********************************* */
    function enviarmensaje($email,$dni,$password){

        require "../phpmailer/class.phpmailer.php";
        $mail = new PHPMailer(true);
        $mail->setFrom('oswaldoelflori@gmail.com', NOMBRE_EMPRESA);
        $mail->addReplyTo('oswaldoelflori@gmail.com', NOMBRE_EMPRESA);
        $mail->addAddress(''.$email);
        $mail->Subject = NOMBRE_EMPRESA.'- Gracias por Registrarte';
        $cabecera = '<p>Gracias por Registrarte,</p> <p><span style="color:#44c421"><strong>'.NOMBRE_EMPRESA.'</strong></span> Siempre pensando en servirte mejor</p>';
        $body = '<p>Sus accesos son los siguientes:</p> <strong>Dni:</strong> '.$dni.'<br /> <strong>Clave:</strong> '.$password.'<br />';
        $footer ='<p>******************* * ************************</p>';
        $msg = $cabecera.$body.$footer;
        $mail->MsgHTML($msg);
        $mail->IsHTML(true);
        if (!$mail->send()){
            return "<p>Mailer Error: " . $mail->ErrorInfo."</p>";
        }else{
            return "Gracias Tu mensaje se envio correctamente";
        }
    }
    function enviarmensajePedidoNuevo($email){

        require "../phpmailer/class.phpmailer.php";
        $mail = new PHPMailer(true);
        $mail->setFrom('no-reply@tubazar.com.pe', NOMBRE_EMPRESA);
        $mail->addReplyTo('no-reply@tubazar.com.pe', NOMBRE_EMPRESA);
        $mail->addAddress(''.$email);
        $mail->Subject = NOMBRE_EMPRESA.'- Tienes un nuevo Pedido';
        $cabecera = '<p>Nuevo pedido entrante,</p> <p><span style="color:#44c421"><strong>'.NOMBRE_EMPRESA.'</strong></span> Siempre pensando en servirte mejor</p>';
        $body = '<p>Hola estimad@ <br/> Tienes un nuevo Pedido<br/>';
        $footer ='<p>******************* * ************************</p>';
        $msg = $cabecera.$body.$footer;
        $mail->MsgHTML($msg);
        $mail->IsHTML(true);
        if (!$mail->send()){
            return "<p>Mailer Error: " . $mail->ErrorInfo."</p>";
        }else{
            return "Gracias Tu mensaje se envio correctamente";
        }
    }    
}
?>