<?php
/* 	*********************************
		Funciones Android
    ********************************* */
ob_start();
session_start();
//Llamando a sesion de la tienda agregada
$IDUSUARIO = $_SESSION['idusuario']; 
$idstore= $_GET['idstore']; 

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= NOMBRE_EMPRESA ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
 
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="../public/img/favicon.ico">
    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">    
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../public/css/general.css">
    <link href="../public/css/fontawesomeiconos.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/my_addresses.css">
  </head>
  <body>
  <div class="header-cont">
    <div class="header flex-container">
      <div class="flex-item">
        <a href="#" onclick="goBackFunctionConditionTerms(<?php echo $idstore; ?>)">
          <i class="fas fa-chevron-left"></i> REGRESAR
        </a>
      </div>

      <div class="flex-item">
        <img src="../files/logosmall.png" width="80" alt="">
      </div>
    </div>
  </div>
  <div class="content_my_account">
     <div class="container">
         <div class="row">logosmall
             <div class="col-md-12">
             <h2>Términos y Condiciones</h2>
             <h4>Aspectos Generales</h4>  
            <p><p style="text-align: justify;">Bienvenido a <strong>TIENDA VIRTUAL</strong>, la aplicaci&oacute;n de compras en l&iacute;nea del <strong><?= NOMBRE_EMPRESA ?></strong>. Estos T&eacute;rminos y Condiciones regulan el acceso en Per&uacute; a nuestra aplicaci&oacute;n m&oacute;vil, en adelante tambi&eacute;n la &ldquo;<strong>APP</strong>&rdquo;, y su uso por todo usuario o consumidor. En esta APP podr&aacute;s usar, sin costo alguno, nuestro software para visitar y adquirir, si lo deseas, los productos y servicios que se exhiben aqu&iacute;. Te recomendamos leer atentamente estos T&eacute;rminos y Condiciones. Estos T&eacute;rminos y Condiciones se aplicar&aacute;n y se entender&aacute;n incorporados en todos los contratos con FR SYSTEM S.A.C. (en adelante <strong>INGETIENDA</strong>), mediante los sistemas de comercializaci&oacute;n comprendidos en esta APP. Esos contratos, el uso de esta APP y la aplicaci&oacute;n de estos T&eacute;rminos y Condiciones se someter&aacute;n a las leyes de la Rep&uacute;blica del Per&uacute;. En consecuencia, gozar&aacute;s de todos los derechos que te reconoce la ley peruana y, adem&aacute;s, de los que te otorgan estos T&eacute;rminos y Condiciones. Tambi&eacute;n podr&aacute;s acceder, en esta misma APP, a los hiperv&iacute;nculos Servicio al Cliente, cuyo objeto es facilitarte el acceso e incrementar los beneficios de uso de la APP, y que pueden variar peri&oacute;dicamente. INGETIENDA aplicar&aacute; estrictamente todos los beneficios y garant&iacute;as que la Ley del Consumidor establece para las transacciones que se realicen a trav&eacute;s de esta APP.</p></p>
            <h4>Acceso y registro para usuarios</h4>
            <h1>T&eacute;rminos y Condiciones</h1>
<h2>Aspectos Generales</h2>
<p>Bienvenido a <strong>TIENDA VIRTUAL</strong>, la aplicaci&oacute;n de compras en l&iacute;nea del <strong> <?= NOMBRE_EMPRESA ?></strong>. Estos T&eacute;rminos y Condiciones regulan el acceso en Per&uacute; a nuestra aplicaci&oacute;n m&oacute;vil, en adelante tambi&eacute;n la &ldquo;<strong>APP</strong>&rdquo;, y su uso por todo usuario o consumidor. En esta APP podr&aacute;s usar, sin costo alguno, nuestro software para visitar y adquirir, si lo deseas, los productos y servicios que se exhiben aqu&iacute;. Te recomendamos leer atentamente estos T&eacute;rminos y Condiciones. Estos T&eacute;rminos y Condiciones se aplicar&aacute;n y se entender&aacute;n incorporados en todos los contratos con <strong>FR SYSTEM S.A.C.</strong> (en adelante <strong>INGETIENDA</strong>), mediante los sistemas de comercializaci&oacute;n comprendidos en esta APP. Esos contratos, el uso de esta APP y la aplicaci&oacute;n de estos T&eacute;rminos y Condiciones se someter&aacute;n a las leyes de la Rep&uacute;blica del Per&uacute;. En consecuencia, gozar&aacute;s de todos los derechos que te reconoce la ley peruana y, adem&aacute;s, de los que te otorgan estos T&eacute;rminos y Condiciones. Tambi&eacute;n podr&aacute;s acceder, en esta misma APP, a los hiperv&iacute;nculos Servicio al Cliente, cuyo objeto es facilitarte el acceso e incrementar los beneficios de uso de la APP, y que pueden variar peri&oacute;dicamente. INGETIENDA aplicar&aacute; estrictamente todos los beneficios y garant&iacute;as que la Ley del Consumidor establece para las transacciones que se realicen a trav&eacute;s de esta APP.</p>
<p>&nbsp;</p>
<h2>Acceso y registro para usuarios</h2>
<p>Para poder ser usuario de la APP es indispensable que cumplas los siguientes requisitos:</p>
<p>Ser mayor de 18 a&ntilde;os de edad.</p>
<p>Completar de manera veraz los campos obligatorios del formulario de registro, en el que se solicitan datos de car&aacute;cter personal como nombre de usuario, correo electr&oacute;nico, documento de identidad DNI n&uacute;mero de tel&eacute;fono y domicilio.</p>
<h2>Aceptar los presentes T&eacute;rminos y Condiciones.</h2>
<h3>Definiciones</h3>
<p>Contenido se refiere a todo tipo de informaci&oacute;n, ya sea gr&aacute;fica o escrita, im&aacute;genes, audio y video, incluyendo pero no limit&aacute;ndose a la ubicaci&oacute;n, anuncios, comentarios, noticias, datos, guiones, gr&aacute;ficos, dibujos o im&aacute;genes, textos, dise&ntilde;o, esquemas, mapas y caracter&iacute;sticas interactivas presentadas por TIENDA VIRTUAL en la APP (y cualquier software y c&oacute;digos inform&aacute;ticos subyacentes), as&iacute; como tambi&eacute;n programas o algoritmos computacionales, m&oacute;dulos de programaci&oacute;n, manuales de operaci&oacute;n, sea que dicho Contenido es generado, provisto o de cualquier otra forma producido o suministrado por TIENDA VIRTUAL.</p>
<p>Equipo corresponde a los tel&eacute;fonos m&oacute;viles, smartphones, tablets, computadores y cualquier otro aparato electr&oacute;nico por el cual se pueda acceder a la APP.</p>
<p>Material de Usuarios es toda clase de fotograf&iacute;as, videos, comentarios, comunicaciones u otros contenidos generado por Usuarios, que hayan sido subidos o cargados a la APP.</p>
<p>Perfil corresponde a la cuenta personal creada por cada Usuario que acredita el registro en la APP, en base a la informaci&oacute;n personal prove&iacute;da por el mismo a INGETIENDA, la cual incluye su nombre, apellidos, RUC, DNI, fecha de nacimiento, direcci&oacute;n, tel&eacute;fono, nombre de usuario, correo electr&oacute;nico y contrase&ntilde;a.</p>
<p>Pol&iacute;tica de Privacidad se refiere a las pol&iacute;ticas de privacidad de INGETIENDA, las cuales se encuentran debidamente publicadas en la APP.</p>
<p>Producto(s) son alimentos, bebidas, alcoh&oacute;licas, y otros art&iacute;culos que pueden ser adquiridos a trav&eacute;s de la APP.</p>
<p>Repartidor(es) es el personal, contratado por INGETIENDA, que efect&uacute;a la entrega de los Productos.</p>
<p>Servicios corresponde a todos los servicios ofrecidos por medio de la APP, as&iacute; como los dem&aacute;s servicios provistos por INGETIENDA, a los cuales los Usuarios pueden acceder por medio de la APP y sus Equipos.</p>
<p>Solicitud de Compra es el pedido particular de un Usuario para la compra de determinados Productos.</p>
<p>T&eacute;rminos y Condiciones de uso o acuerdo hacen referencia a los presentes T&eacute;rminos y Condiciones de <strong>TIENDA VIRTUAL</strong>.</p>
<p>Usuario(s) es toda persona natural o jur&iacute;dica, o representante en cualquier forma de los mismos, que utilice o que se encuentra registrado como tal en la <strong>APP</strong>.</p>
<p>Zona de picking es el lugar f&iacute;sico de donde se realiza la compra, puede ser una tienda o un centro de distribuci&oacute;n.</p>
<p>Delivery es el servicio por traslado de la mercader&iacute;a a la direcci&oacute;n indicada por el usuario.</p>
<p>Zona de cobertura es el &aacute;rea geogr&aacute;fica cubierta para Delivery.</p>
<p>Aceptaci&oacute;n de los t&eacute;rminos de uso</p>
<p>Mediante la creaci&oacute;n de un Perfil y/o la utilizaci&oacute;n en cualquier forma de los Servicios y de la <strong>APP</strong>, el Usuario acepta todos los T&eacute;rminos de Uso aqu&iacute; contenidos y la Pol&iacute;tica de Privacidad. Asimismo, se entiende que acepta todas las dem&aacute;s reglas de operaci&oacute;n, pol&iacute;ticas y procedimientos que puedan ser publicados por TIENDA VIRTUAL en la APP, cada uno de los cuales se incorpora por referencia.</p>
<h3>Oportunidades que te ofrece esta APP</h3>
<p>En TIENDA VIRTUAL puedes hacer tus compras online y elegir el despacho seg&uacute;n nuestros horarios de entrega establecidos en 9:00 y 16:00 horas y si el pedido tiene pocos productos y la distancia con la tienda y el picking (lugar donde se hizo el pedido) es menor a 500 metros el pedido se entregar&aacute; en un plazo de 45 a 90 minutos, a tu domicilio o a la direcci&oacute;n que selecciones. A continuaci&oacute;n, te indicamos c&oacute;mo hacerlo.</p>
<h2>C&oacute;mo comprar</h2>
<p>Para hacer compras o contratar servicios en esta APP, deber&aacute;s seguir los siguientes pasos:</p>
<p>&nbsp;</p>
<p>Ingresa a la APP</p>
<p>Elige tu direcci&oacute;n de despacho dentro de la zona de cobertura disponible en la APP.</p>
<p>Selecciona los productos de tu inter&eacute;s entre los que est&aacute;n informados en la APP.</p>
<p>Ingresa tu documento de identidad DNI y tu clave. Si no est&aacute;s registrado en la APP y deseas hacerlo, utiliza el link "reg&iacute;strate".</p>
<p>Si decides salir de la APP y volver m&aacute;s tarde, al reingresar podr&aacute;s rescatar el carro y continuar con tu proceso de compra, siempre que el producto est&eacute; disponible. Se aplicar&aacute; el precio que est&eacute; vigente y el medio de pago elegido al retomar el proceso de compra.</p>
<p>Selecciona las condiciones de despacho y entrega de los productos adquiridos entre las que se encuentren informadas en la APP. Al indicar los datos de tu solicitud de despacho, recuerda revisar que tu nombre, DNI, domicilio, direcci&oacute;n de correo electr&oacute;nico y tel&eacute;fonos de contacto sean correctos.</p>
<p>Esta informaci&oacute;n es fundamental para una correcta y oportuna entrega de tus productos en tu domicilio, o en el lugar que hayas indicado para la entrega. La informaci&oacute;n del lugar de env&iacute;o es de exclusiva responsabilidad del usuario.</p>
<p>El personal de transporte no est&aacute; autorizado para instalar, armar, intervenir o alterar los productos en el domicilio.</p>
<p>Recuerda que el lugar f&iacute;sico donde se realiza la entrega debe asegurar las condiciones m&iacute;nimas para el acceso del medio de transporte, esto es, disponibilidad de estacionamiento y horario de acceso, as&iacute; como ascensor cuando el peso o el volumen de tus compras lo haga necesario.</p>
<p>Solo pueden comprar en esta APP personas mayores de edad. Asimismo, los productos deben ser recibidos por una persona mayor de edad.</p>
<p>Al aceptar la compra, quedar&aacute; colocada tu solicitud, se desplegar&aacute; en tu pantalla una descripci&oacute;n del producto, su precio al momento de colocar la solicitud de compra (seg&uacute;n el lugar de despacho), la fecha de entrega, el valor total de la operaci&oacute;n y las dem&aacute;s condiciones de tu compra.</p>
<p>Tu solicitud de compra pasar&aacute; autom&aacute;ticamente a un proceso de confirmaci&oacute;n de identidad, en resguardo de tu seguridad, as&iacute; como de la disponibilidad, vigencia y cupo del medio de pago seleccionado.</p>
<p>Cumplida exitosamente la condici&oacute;n anterior, se efectuar&aacute; una reserva de cupo en el medio de pago, el cual solo se har&aacute; efectivo una vez que tus productos est&eacute;n listos para pasar por caja el d&iacute;a y hora del despacho, y que ser&aacute; ajustado de acuerdo a productos sustituidos, faltantes y/o agregados de acuerdo a tu aprobaci&oacute;n, la cual puedes otorgar mediante nuestro WhatsApp.</p>
<p>Junto con tu pedido, recibir&aacute;s la respectiva boleta o factura electr&oacute;nica.</p>
<p>Atenderemos todas tus consultas acerca de tu solicitud de compra en el WhatsApp de soporte, en el chat en vivo con el picker o con el driver de la APP. Debes tener los antecedentes de la compra (reserva, y n&uacute;mero de solicitud de compra).</p>
<p>En TIENDA VIRTUAL tenemos un monto m&iacute;nimo de compra de 30 soles.</p>
<p>&nbsp;</p>
<h3>Costos por delivery del APP</h3>
<p>0 - 500 mts. precio: gratis.</p>
<p>500 - 1000 mts. precio: S/ 3.00.</p>
<p>1000 - 2500 mts. precio: S/5.00.</p>
<p>Atenci&oacute;n: Si el distrito de origen es diferente al distrito del destino el aplicativo mostrara un costo por delivery de S/ 15 soles.</p>
<p>El m&aacute;ximo de compra corresponde a 6 unidades de cada producto por DNI de cliente; y si se trata de productos en promoci&oacute;n u oferta, un m&aacute;ximo de 6 unidades por DNI de cliente.</p>
<p>Se aceptan compras con boleta y factura.</p>
<p>En TIENDA VIRTUAL no debes darles propina a nuestros repartidores, ellos ya reciben un pago por sus servicios.</p>
<h3>Pol&iacute;tica de cambio y devoluci&oacute;n de productos</h3>
<p>En TIENDA VIRTUAL nuestra prioridad es que te sientas satisfecho con tus compras y respaldado por la atenci&oacute;n que damos a nuestros usuarios. Por eso, junto con las garant&iacute;as legales y las ofrecidas por los fabricantes de los productos que vendemos, como empresa te entregamos beneficios adicionales para garantizar tu satisfacci&oacute;n, facilitando los cambios o devoluciones que necesites hacer. A continuaci&oacute;n, te explicamos c&oacute;mo funciona cada una de las garant&iacute;as a las cuales te puedes acoger.</p>
<p>&nbsp;</p>
<h2>Pol&iacute;tica de satisfacci&oacute;n y experiencia de compra</h2>
<p>Ten presente que no es posible poner t&eacute;rmino unilateralmente a los contratos celebrados a trav&eacute;s de la APP; sin embargo, gozar&aacute;s de los beneficios y garant&iacute;as adicionales a la Ley del Consumidor que se indican a continuaci&oacute;n. En TIENDA VIRTUAL APP trabajamos con los m&aacute;s altos est&aacute;ndares de calidad, tanto en nuestros productos como en el servicio que te ofrecemos. En nuestros procesos contamos con tecnolog&iacute;a especializada y personal operativo de calidad para almacenar, seleccionar, empacar y entregar los pedidos puntualmente.</p>
<p>&nbsp;En TIENDA VIRTUAL cambiar de opini&oacute;n no es un problema. En las compras de productos no perecibles podr&aacute;s solicitar la devoluci&oacute;n, dentro del mismo d&iacute;a de la compra, presentando la boleta, aunque los productos no tengan fallas o defectos. Recuerda que el producto lo tenemos que recibir tal y como lo entregamos en tu domicilio; es decir, no puede haber sido abierto, ni probado ni usado, debe estar sellado, con sus embalajes originales completos, no pueden estar rotos los sellos, las gr&aacute;ficas de cajas, plumavit y otras protecciones interiores, amarras u otros. Considera todos los accesorios al entregar el producto, para que no pierdas tu tiempo cuando lo retiremos o cuando lo entregues en alguno de nuestras tiendas. En el caso de productos perecibles / que requieran refrigeraci&oacute;n no existir&aacute; la posibilidad de realizar devoluci&oacute;n o cambio, con excepci&oacute;n de los casos en que sea error del proceso de picking, o deterioro en el delivery. Devoluciones al momento de la entrega: si durante el proceso de entrega de los productos evidencias alguna falla o defecto, podr&aacute;s hacer la solicitud de devoluci&oacute;n de el o los productos que presenten alg&uacute;n inconveniente, en ning&uacute;n caso se podr&aacute; devolver la compra en su totalidad. El o los productos ser&aacute;n devueltos con el repartidor y se realizara nota de cr&eacute;dito.</p>
<p>Una vez se hizo el pedido se enviar&aacute; un correo notificando los detalles de la compra.</p>
<p>Si al momento de entregar el pedido, el cliente no se encuentra en el domicilio indicado, el repartidor llamar&aacute; 3 veces al cliente, de no encontraste presente se regresar&aacute; los productos al almac&eacute;n dejando anulado el pedido. El costo del delivery ser&aacute; asumido por el cliente.</p>
<p>El procedimiento de pago con tarjeta se realizar&aacute; a trav&eacute;s de IZPAY</p>
<p>Cualquier consulta sobre el aplicativo comunica a nuestro WhatsApp online que estar&aacute; atendiendo de 8:00 - 16:00 horas</p>
<p>Actualmente contamos con nuestra sede principal en San Borja S/N. Tienda CGE.</p>

<h2>Garant&iacute;a</h2>
<p>Producto equivocado: en el caso de que enviemos un producto equivocado, se te reintegrar&aacute; el 100% del cobro y lo retiraremos en la misma direcci&oacute;n de entrega previa coordinaci&oacute;n. Las devoluciones pueden hacerse en cr&eacute;ditos o directo al mismo medio de pago que hayas utilizado. Los reembolsos que se realizan directamente a tu medio de pago demorar&aacute;n el plazo que las entidades bancarias tengan establecidos, y los ver&aacute;s reflejados en tu cuenta una vez que tu banco haya finalizado el proceso.</p>
<p>&nbsp;</p>
<h3>Horario de atenci&oacute;n</h3>
<p>El servicio de compra se encontrar&aacute; disponible de lunes a domingo entre 8:00 y 16:00 horas, excepto feriados.</p>
<h3>Plazo de entrega</h3>
<p>La compra ser&aacute; entregada en un m&iacute;nimo de 45 minutos y el tiempo m&aacute;ximo depender&aacute; del n&uacute;mero de art&iacute;culos agregado a tu carrito de compra, y ser&aacute; informado antes de ser colocada tu Solicitud de Compra, una vez que ingreses la direcci&oacute;n de env&iacute;o. El plazo de entrega comienza a correr una vez que recibes nuestro e-mail de confirmaci&oacute;n de tu solicitud de compra.</p>
<p>Los pedidos que sobrepasen los 7 art&iacute;culos ser&aacute;n entregados al d&iacute;a siguiente; todos nuestros pedidos son entregados de lunes a s&aacute;bado en horario de 8:00 y 16:00 horas.</p>
<h3>Criterio de sustituci&oacute;n</h3>
<p>En caso de que selecciones un producto y &eacute;ste no estuviese disponible en la tienda, te contactaremos telef&oacute;nicamente, y/o v&iacute;a WhatsApp, con un m&aacute;ximo dos intentos, esto durante la recolecci&oacute;n de la compra para informarte y ofrecerte un producto alternativo. Si no podemos comunicarnos para ofrecerte sustitutos, no enviaremos los productos sin stock y los reembolsaremos, es responsabilidad del usuario hacer efectivo alguno de los contactos para poder sustituir, agregar o cancelar de ser necesario, de lo contrario se proceder&aacute; con el despacho, cobro y env&iacute;o de los productos solicitados y encontrados. En el caso de las sustituciones, se cobrar&aacute; el valor del producto sustituto.</p>
<h3>Servicio de atenci&oacute;n al cliente</h3>
<p>Puedes acceder a nuestro servicio de atenci&oacute;n al cliente, comunic&aacute;ndote con nosotros a trav&eacute;s del WhatsApp. +51938222552.</p>
<h3>Medios de pago que aceptamos:</h3>
<p>Pago efectivo, VISA, MasterCard, Amex, Dinners Club, Oh!, Ripley, CMR, Cencosud, Bonus, Sodexo y Discover. Si el pedido es cancelado dentro de los primeros 5 minutos se podr&aacute; cancelar sin ning&uacute;n cargo adicional. La APP estar&aacute; disponible de lunes a s&aacute;bado de 8:00 - 16:00 horas. Pasado ese horario la APP no estar&aacute; disponible hasta el d&iacute;a siguiente. Si el pago se hace en efectivo y el cliente ingresa con cu&aacute;nto cancelar&aacute; se le tendr&aacute; reservado el vuelto cuando llegue.</p>
<p>Pensando en tu salud podr&aacute;s ingresar el importe total a cancelar el pedido y tendremos reservado tu vuelto al momento de la entrega de tu pedido.</p>
           </div>
         </div>
     </div>
  </div>
<?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/terminos_condiciones.js"></script>