<?php
/* 	*********************************
		Funciones Android
    ********************************* */
ob_start();
session_start();
require_once "../modelos/Producto_Android.php";
/* $_SESSION['idusuario'] =1; */
 $IDUSUARIO = $_SESSION['idusuario'];
$productoandroid = new Producto_Android();

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
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="../public/img/favicon.ico">
    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">    
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
    
    <link rel="stylesheet" href="../public/css/general.css">
    <link rel="stylesheet" href="../public/css/conditions_terms.css">
</head>
  <body class="hold-transition skin-green sidebar-mini ">
  <div class="toBack green">
 <span onclick="goBackFunction(<?php echo  $idstore; ?>)" > <i class="fa fa-chevron-left" aria-hidden="true"></i> Regresar</span>
                </div>  
                <style>

*{
    font-family: Arial, Helvetica, sans-serif;
    line-height: 30px;
}
</style>
<section>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
            <h2>INFORMACI&Oacute;N GENERAL</h2>
<p>Esta aplicaci&oacute;n es operada por ASOCIACION CIRCULO MILITAR DEL PERU En todo el sitio, los t&eacute;rminos &ldquo;nosotros&rdquo;, &ldquo;nos&rdquo; y &ldquo;nuestro&rdquo; se refieren a ASOCIACION CIRCULO MILITAR DEL PERU . ASOCIACION CIRCULO MILITAR DEL PERU  ofrece este sitio web, incluyendo toda la informaci&oacute;n, herramientas y servicios disponibles para ti en este sitio, el usuario, est&aacute; condicionado a la aceptaci&oacute;n de todos los t&eacute;rminos, condiciones, pol&iacute;ticas y notificaciones aqu&iacute; establecidos.</p>
<p>Al visitar nuestro sitio y/o comprar algo de nosotros, paticipas en nuestro &ldquo;Servicio&rdquo; y aceptas los siguientes t&eacute;rminos y condiciones (&ldquo;T&eacute;rminos de Servicio&rdquo;, &ldquo;T&eacute;rminos&rdquo;), inclu&iacute;dos todos los t&eacute;rminos y condiciones adicionales y las pol&iacute;tias a las que se hace referencia en el presente documento y/o disponible a trav&eacute;s de hiperv&iacute;nculos. Estas Condiciones de Servicio se aplican a todos los usuarios del sitio, incluyendo si limitaci&oacute;n a usuarios que sean navegadores, proveedores, clientes, comerciantes, y/o colaboradores de contenido.</p>
<p>Por favor, lee estos T&eacute;rminos de Servicio cuidadosamente antes de acceder o utilizar nuestro sitio web. Al acceder o utilizar cualquier parte del sitio, est&aacute;s aceptando los T&eacute;rminos de Servicio. Si no est&aacute;s de acuerdo con todos los t&eacute;rminos y condiciones de este acuerdo, entonces no deber&iacute;as acceder a la p&aacute;gina web o usar cualquiera de los servicios. Si las T&eacute;rminos de Servicio son considerados una oferta, la aceptaci&oacute;n est&aacute; expresamente limitada a estos T&eacute;rminos de Servicio.</p>
<p><br />Cualquier funci&oacute;n nueva o herramienta que se a&ntilde;adan a la tienda actual, tambien estar&aacute;n sujetas a los T&eacute;rminos de Servicio. Puedes revisar la versi&oacute;n actualizada de los T&eacute;rminos de Servicio, en cualquier momento en esta p&aacute;gina. Nos reservamos el derecho de actualizar, cambiar o reemplazar cualquier parte de los T&eacute;rminos de Servicio mediante la publicaci&oacute;n de actualizaciones y/o cambios en nuestro sitio web. Es tu responsabilidad chequear esta p&aacute;gina peri&oacute;dicamente para verificar cambios. Tu uso cont&iacute;nuo o el acceso al sitio web despu&eacute;s de la publicaci&oacute;n de cualquier cambio constituye la aceptaci&oacute;n de dichos cambios.</p>
<p>Nuestra tienda se encuentra alojada en Shopify Inc. Ellos nos proporcionan la plataforma de comercio electr&oacute;nico en l&iacute;nea, que nos permite venderte nuestros productos y servicios.</p>
<h3><br />SECCI&Oacute;N 1 - T&Eacute;RMINOS DE LA TIENDA EN L&Iacute;NEA</h3>
<p>Al utilizar este sitio, declaras que tienes al menos la mayor&iacute;a de edad en tu estado o provincia de residencia, o que tienes la mayor&iacute;a de edad en tu estado o provincia de residencia y que nos has dado tu consentimiento para permitir que cualquiera de tus dependientes menores use este sitio.</p>
<p>No puedes usar nuestros productos con ning&uacute;n prop&oacute;sito ilegal o no autorizado tampoco puedes, en el uso del Servicio, violar cualquier ley en tu jurisdicci&oacute;n (incluyendo pero no limitado a las leyes de derecho de autor).</p>
<p>No debes transmitir gusanos, virus o cualquier c&oacute;digo de naturaleza destructiva.</p>
<p>El incumplimiento o violaci&oacute;n de cualquiera de estos T&eacute;rminos dar&aacute;n lugar al cese inmediato de tus Servicios.</p>
<h3><br />SECCI&Oacute;N 2 - CONDICIONES GENERALES</h3>
<p>Nos reservamos el derecho de rechazar la prestaci&oacute;n de servicio a cualquier persona, por cualquier motivo y en cualquier momento.</p>
<p>Entiendes que tu contenido (sin incluir la informaci&oacute;n de tu tarjeta de cr&eacute;dito), puede ser transferida sin encriptar e involucrar (a) transmisiones a trav&eacute;s de varias redes; y (b) cambios para ajustarse o adaptarse a los requisitos t&eacute;cnicosde conexi&oacute;n de redes o dispositivos. La informaci&oacute;n de tarjetas de cr&eacute;dito est&aacute; siempre encriptada durante la transferencia a trav&eacute;s de las redes.</p>
<p>Est&aacute;s de acuerdo con no reproducir, duplicar, copiar, vender, revender o explotar cualquier parte del Servicio, usp del Servicio, o acceso al Servicio o cualquier contacto en el sitio web a trav&eacute;s del cual se presta el servicio, sin el expreso permiso por escrito de nuestra parte.</p>
<p>Los t&iacute;tulos utilizados en este acuerdo se icluyen solo por conveniencia y no limita o afecta a estos T&eacute;rminos.</p>
<br />
<h3>SECCI&Oacute;N 3 - EXACTITUD, EXHAUSTVIDAD Y ACTUALIDAD DE LA INFORMACI&Oacute;N</h3>
<p>No nos hacemos responsables si la informaci&oacute;n disponible en este sitio no es exacta, completa o actual. El material en este sitio es provisto solo para informaci&oacute;n general y no debe confiarse en ella o utilizarse como la &uacute;nica base para la toma de decisiones sin consultar primeramente, informaci&oacute;n m&aacute;s precisa, completa u oportuna. Cualquier dependencia em el materia de este sitio es bajo su propio riesgo.</p>
<p>Este sitio puede contener cierta informaci&oacute;n hist&oacute;rica. La informaci&oacute;n hist&oacute;rica, no es necesriamente actual y es provista &uacute;nicamente para tu referencia. Nos reservamos el derecho de modificar los contenidos de este sitio en cualquier momento, pero no tenemos obligaci&oacute;n de actualizar cualquier informaci&oacute;n en nuestro sitio. Aceptas que es tu responsabilidad de monitorear los cambios en nuestro sitio.</p>
<h3>SECTION 4 - MODIFICACIONES AL SERVICIO Y PRECIOS</h3>
<p>Los precios de nuestros productos est&aacute;n sujetos a cambio sin aviso.</p>
<p>Nos reservamos el derecho de modificar o discontinuar el Servicio (o cualquier parte del contenido) en cualquier momento sin aviso previo.</p>
<p>No seremos responsables ante ti o alguna tercera parte por cualquier modificaci&oacute;n, cambio de precio, suspensi&oacute;n o discontinuidad del Servicio.</p>
<br />
<h3>SECCI&Oacute;N 5 - PRODUCTOS O SERVICIOS (si aplicable)</h3>
<p>Ciertos productos o servicios puedene star disponibles exclusivamente en l&iacute;nea a trav&eacute;s del sitio web. Estos productos o servicios pueden tener cantidades limitadas y estar sujetas a devoluci&oacute;n o cambio de acuerdo a nuestra pol&iacute;tica de devoluci&oacute;n solamente.</p>
<p>Hemos hecho el esfuerzo de mostrar los colores y las im&aacute;genes de nuestros productos, en la tienda, con la mayor precisi&oacute;n de colores posible. No podemos garantizar que el monitor de tu computadora muestre los colores de manera exacta.</p>
<p>Nos reservamos el derecho, pero no estamos obligados, para limitar las ventas de nuestros productos o servicios a cualquier persona, regi&oacute;n geogr&aacute;fica o jurisdicci&oacute;n. Podemos ejercer este derecho basados en cada caso. Nos reservamos el derecho de limitar las cantidades de los productos o servicios que ofrecemos. Todas las descripciones de productos o precios de los productos est&aacute;n sujetos a cambios en cualquier momento sin previo aviso, a nuestra sola discreci&oacute;n. Nos reservamos el derecho de discontinuar cualquier producto en cualquier momento. Cualquier oferta de producto o servicio hecho en este sitio es nulo donde est&eacute; prohibido.</p>
<p>No garantizamos que la calidad de los productos, servicios, informaci&oacute;n u otro material comprado u obtenido por ti cumpla con tus expectativas, o que cualquier error en el Servicio ser&aacute; corregido.</p>
<br />
<h3>SECCI&Oacute;N 6 - EXACTITUD DE FACTURACI&Oacute;N E INFORMACI&Oacute;N DE CUENTA</h3>
<p>Nos reservamos el derecho de rechazar cualquier pedido que realice con nosotros. Podemos, a nuestra discreci&oacute;n, limitar o cancelar las cantidades compradas por persona, por hogar o por pedido. Estas restricciones pueden incluir pedidos realizados por o bajo la misma cuenta de cliente, la misma tarjeta de cr&eacute;dito, y/o pedidos que utilizan la misma facturaci&oacute;n y/o direcci&oacute;n de env&iacute;o.</p>
<p>En el caso de que hagamos un cambio o cancelemos una orden, podemos intentar notificarte poni&eacute;ndonos en contacto v&iacute;a correo electr&oacute;nico y/o direcci&oacute;n de facturaci&oacute;n / n&uacute;mero de tel&eacute;fono proporcionado en el momento que se hizo pedido. Nos reservamos el derecho de limitar o prohibir las &oacute;rdenes que, a nuestro juicio, parecen ser colocado por los concesionarios, revendedores o distribuidores.</p>
<p>Te comprometes a proporcionar informaci&oacute;n actual, completa y precisa de la compra y cuenta utilizada para todas las compras realizadasen nuestra tienda. Te comprometes a ctualizar r&aacute;pidamente tu cuenta y otra informaci&oacute;n, incluyendo tu direcci&oacute;n de correo electr&oacute;nico y n&uacute;meros de tarjetas de cr&eacute;dito y fechas de vencimiento, para que podamos completar tus transacciones y contactarte cuando sea necesario.</p>
<p>Para m&aacute;s detalles, por favor revisa nuestra Pol&iacute;tica de Devoluciones.</p>
<h3>SECCI&Oacute;N 7 - HERRAMIENTAS OPCIONALES</h3>
<p>Es posible que te proporcionemos aceso a herramientas de terceros a los cuales no monitoreamos y sobre los que no tenemos control ni entrada.</p>
<p>Reconoces y aceptas que proporcionamos acceso a este tipo de herramientas "tal cual" y "seg&uacute;n disponibilidad" sin garant&iacute;as, representaciones o condiciones de ning&uacute;n tipo y sin ning&uacute;n respaldo. No tendremos responsabilidad alguna derivada de o relacionada con tu uso de herramientas proporcionadas por terceras partes.</p>
<p>Cualquier uso que hagas de las herramientas opcionales que se ofrecen a trav&eacute;s del sitio bajo tu propio riesgo y discreci&oacute;n y debes asegurarte de estar familiarizado y aprobar los t&eacute;rminos bajo los cuales estas herramientas son proporcionadas por el o los proveedores de terceros.</p>
<p>Tambien es posible que, en el futuro, te ofrezcamos nuevos servicios y/o caracter&iacute;sticas a trav&eacute;s del sitio web (incluyendo el lanzamiento de nuevas herramientas y recursos). Estas nuevas carater&iacute;sticas y/o servicios tambien estar&aacute;n sujetos a estos T&eacute;rminos de Servicio.</p>
<h3>SECCI&Oacute;N 8 - ENLACES DE TERCERAS PARTES</h3>
<p>Cierto contenido, productos y servicios disponibles v&iacute;a nuestro Servicio puede inclu&iacute;r material de terceras partes.</p>
<p>Enlaces de terceras partes en este sitio pueden direccionarte a sitios web de terceras partes que no est&aacute;n afiliadas con nosotros. No nos responsabilizamos de examinar o evaluar el contenido o exactitud y no garantizamos ni tendremos ninguna obligaci&oacute;n o responsabilidad por cualquier material de terceros o siitos web, o de cualquier material, productos o servicios de terceros.</p>
<p>No nos hacemos responsables de cualquier da&ntilde;o o da&ntilde;os relacionados con la adquisici&oacute;n o utilizaci&oacute;n de bienes, servicios, recursos, contenidos, o cualquier otra transacci&oacute;n realizadas en conexi&oacute;n con sitios web de terceros. Por favor revisa cuidadosamente las pol&iacute;ticas y pr&aacute;cticas de terceros y aseg&uacute;rate de entenderlas antes de participar en cualquier transacci&oacute;n. Quejas, reclamos, inquietudes o pregutas con respecto a productos de terceros deben ser dirigidas a la tercera parte.</p>
<h3>SECCI&Oacute;N 9 - COMENTARIOS DE USUARIO, CAPTACI&Oacute;N Y OTROS ENV&Iacute;OS</h3>
<p>Si, a pedido nuestro, env&iacute;as ciertas presentaciones espec&iacute;ficas (por ejemplo la participaci&oacute;n en concursos) o sin un pedido de nuestra parte env&iacute;as ideas creativas, sugerencias, proposiciones, planes, u otros materiales, ya sea en l&iacute;nea, por email, por correo postal, o de otra manera (colectivamente, 'comentarios'), aceptas que podamos, en cualquier momento, sin restricci&oacute;n, editar, copiar, publicar, distribu&iacute;r, traducir o utilizar por cualquier medio comentarios que nos hayas enviado. No tenemos ni tendremos ninguna obligaci&oacute;n (1) de mantener ning&uacute;n comentario confidencialmente; (2) de pagar compensaci&oacute;n por comentarios; o (3) de responder a comentarios.</p>
<p>Nosotros podemos, pero no tenemos obligaci&oacute;n de, monitorear, editar o remover contenido que consideremos sea ileg&iacute;timo, ofensivo, amenazante, calumnioso, difamatorio, pornogr&aacute;fico, obsceno u objetable o viole la propiedad intelectual de cualquiera de las partes o los T&eacute;rminos de Servicio.</p>
<p>Aceptas que tus comentarios no violar&aacute;n los derechos de terceras partes, incluyendo derechos de autor, marca, privacidad, personalidad u otro derechos personal o de propiedad. Asimismo, aceptas que tus comentarios no contienen material difamatorio o ilegal, abusivo u obsceno, o contienen virus inform&aacute;ticos u otro malware que pudiera, de alguna manera, afectar el funcionamiento del Srvicio o de cualquier sitio web relacionado. No puedes utilizar una direcci&oacute;n de correo electr&oacute;nico falsa, usar otra identidad que no sea leg&iacute;tima, o enga&ntilde;ar a terceras partes o a nosotros en cuanto al origen de tus comentarios. Tu eres el &uacute;nico responsable por los comentarios que haces y su precisi&oacute;n. No nos hacemos responsables y no asumimos ninguna obligaci&oacute;n con respecto a los comentarios publicados por ti o cualquier tercer parte.</p>
<br /><h3>SECCI&Oacute;N 10 - INFORMACI&Oacute;N PERSONAL</h3>
<p>Tu presentaci&oacute;n de informaci&oacute;n personal a trav&eacute;s del sitio se rige por nuestra Pol&iacute;tica de Privacidad. Para ver nuestra Pol&iacute;tica de Privacidad.</p>
<br /><h3>SECCI&Oacute;N 11 - ERRORES, INEXACTITUDES Y OMISIONES</h3>
<p>De vez en cuando puede haber informaci&oacute;n en nuestro sitio o en el Servicio que contiene errores tipogr&aacute;ficos, inexactitudes u omisiones que puedan estar relacionadas con las descripciones de productos, precios, promociones, ofertas, gastos de env&iacute;o del producto, el tiempo de tr&aacute;nsito y la disponibilidad. Nos reservamos el derecho de corregir los errores, inexactitudes u omisiones y de cambiar o actualizar la informaci&oacute;n o cancelar pedidos si alguna informaci&oacute;n en el Servicio o en cualquier sitio web relacionado es inexacta en cualquier momento sin previo aviso (incluso despu&eacute;s de que hayas enviado tu orden) .</p>
<p>No asumimos ninguna obligaci&oacute;n de actualizar, corregir o aclarar la informaci&oacute;n en el Servicio o en cualquier sitio web relacionado, incluyendo, sin limitaci&oacute;n, la informaci&oacute;n de precios, excepto cuando sea requerido por la ley. Ninguna especificaci&oacute;n actualizada o fecha de actualizaci&oacute;n aplicada en el Servicio o en cualquier sitio web relacionado, debe ser tomada para indicar que toda la informaci&oacute;n en el Servicio o en cualquier sitio web relacionado ha sido modificado o actualizado.</p>
<br /><h3>SECCI&Oacute;N 12 - USOS PROHIBIDOS</h3>
<p>En adici&oacute;n a otras prohibiciones como se establece en los T&eacute;rminos de Servicio, se prohibe el uso del sitio o su contenido: (a) para ning&uacute;n prop&oacute;sito ilegal; (b) para pedirle a otros que realicen o partiicpen en actos il&iacute;citos; (c) para violar cualquier regulaci&oacute;n, reglas, leyes internacionales, federales, provinciales o estatales, u ordenanzas locales; (d) para infringir o violar el derecho de propiedad intelectual nuestro o de terceras partes; (e) para acosar, abusar, insultar, da&ntilde;ar, difamar, calumniar, desprestigiar, intimidar o discriminar por razones de g&eacute;nero, orientaci&oacute;n sexual, religi&oacute;n, tnia, raza, edad, nacionalidad o discapacidad; (f) para presentar informaci&oacute;n falsa o enga&ntilde;osa; (g) para cargar o transmitir virus o cualquier otro tipo de c&oacute;digo malicioso que sea o pueda ser utilizado en cualquier forma que pueda comprometer la funcionalidad o el funcionamientodel Servicio o de cualquier sitio web relacionado, otros sitios o Internet; (h) para recopilar o rastrear informaci&oacute;n personal de otros; (i) para generar spam, phish, pharm, pretext, spider, crawl, or scrape; (j) para cualquier prop&oacute;sito obsceno o inmoral; o (k) para interferir con o burlar los elementos de seguridad del Servicio o cualquier sitio web relacionado&iquest; otros sitios o Internet. Nos reservamos el derecho de suspender el uso del Servicio o de cualquier sitio web relacionado por violar cualquiera de los &iacute;tems de los usos prohibidos.</p>
<br /><h3>SECCI&Oacute;N 13 - EXCLUSI&Oacute;N DE GARANT&Iacute;AS; LIMITACI&Oacute;N DE RESPONSABILIDAD</h3>
<p>No garantizamos ni aseguramos que el uso de nuestro servicio ser&aacute; ininterrumpido, puntual, seguro o libre de errores.</p>
<p>No garantizamos que los resultados que se puedan obtener del uso del servicio ser&aacute;n exactos o confiables.</p>
<p>Aceptas que de vez en cuando podemos quitar el servicio por per&iacute;odos de tiempo indefinidos o cancelar el servicio en cualquier momento sin previo aviso.</p>
<p>Aceptas expresamenteque el uso de, o la posibilidad de utilizar, el servicio es bajo tu propio riesgo. El servicio y todos los productos y servicios proporcionados a trav&eacute;s del servicio son (salvo lo expresamente manifestado por nosotros) proporcionados "tal cual" y "seg&uacute;n est&eacute; disponible" para su uso, sin ning&uacute;n tipo de representaci&oacute;n, garant&iacute;as o condiciones de ning&uacute;n tipo, ya sea expresa o impl&iacute;cita, inclu&iacute;das todas las garant&iacute;as o condiciones impl&iacute;citas de comercializaci&oacute;n, calidad comercializable, la aptitud para un prop&oacute;sito particular, durabilidad, t&iacute;tulo y no infracci&oacute;n.</p>
<p>En ning&uacute;n caso ASOCIACION CIRCULO MILITAR DEL PERU , nuestros directores, funcionarios, empleados, afiliados, agentes, contratistas, internos, proveedores, prestadores de servicios o licenciantes ser&aacute;n responsables por cualquier da&ntilde;o, p&eacute;rdida, reclamo, o da&ntilde;os directos, indirectos, incidentales, punitivos, especiales o consecuentes de cualquier tipo, incluyendo, sin limitaci&oacute;n, p&eacute;rdida de beneficios, p&eacute;rdida de igresos, p&eacute;rdida de ahorros, p&eacute;rdida de datos, costos de reemplazo, o cualquier da&ntilde;o similar, ya sea basado en contrato, agravio (incluyendo negligencia), responsabilidad estricta o de otra manera, como consecuencia del uso de cualquiera de los servicios o productos adquiridos mediante el servicio, o por cualquier otro reclamo relacionado de alguna manera con el uso del servicio o cualquier producto, incluyendo pero no limitado, a cualquier error u omisi&oacute;n en cualquier contenido, o cualquier p&eacute;rdida o da&ntilde;o de cualquier tipo incurridos como resultados de la utilizaci&oacute;n del servicio o cualquier contenido (o producto) publicado, transmitido, o que se pongan a disposici&oacute;n a trav&eacute;s del servicio, incluso si se avisa de su posibilidad. Debido a que algunos estados o jurisdicciones no permiten la exclusi&oacute;n o la limitaci&oacute;n de responsabilidad por da&ntilde;os consecuenciales o incidentales, en tales estados o jurisdicciones, nuestra responsabilidad se limitar&aacute; en la medida m&aacute;xima permitida por la ley.</p>
<br /><h3>SECCI&Oacute;N 14 - INDEMNIZACI&Oacute;N</h3>
<p>Aceptas indemnizar, defender y mantener indemne ASOCIACION CIRCULO MILITAR DEL PERU  y nuestras matrices, subsidiarias, afiliados, socios, funcionarios, directores, agentes, contratistas, concesionarios, proveedores de servicios, subcontratistas, proveedores, internos y empleados, de cualquier reclamo o demanda, incluyendo honorarios razonables de abogados, hechos por cualquier tercero a causa o como resultado de tu incumplimiento de las Condiciones de Servicio o de los documentos que incorporan como referencia, o la violaci&oacute;n de cualquier ley o de los derechos de u tercero.</p>
<h3>SECCI&Oacute;N 15 - DIVISIBILIDAD</h3>
<p>En el caso de que se determine que cualquier disposici&oacute;n de estas Condiciones de Servicio sea ilegal, nula o inejecutable, dicha disposici&oacute;n ser&aacute;, no obstante, efectiva a obtener la m&aacute;xima medida permitida por la ley aplicable, y la parte no exigible se considerar&aacute; separada de estos T&eacute;rminos de Servicio, dicha determinaci&oacute;n no afectar&aacute; la validez de aplicabilidad de las dem&aacute;s disposiciones restantes.</p>
<br /><h3>SECCI&Oacute;N 16 - RESCISI&Oacute;N</h3>
<p>Las obligaciones y responsabilidades de las partes que hayan incurrido con anterioridad a la fecha de terminaci&oacute;n sobrevivir&aacute;n a la terminaci&oacute;n de este acuerdo a todos los efectos.</p>
<p>Estas Condiciones de servicio son efectivos a menos que y hasta que sea terminado por ti o nosotros. Puedes terminar estos T&eacute;rminos de Servicio en cualquier momento por avisarnos que ya no deseas utilizar nuestros servicios, o cuando dejes de usar nuestro sitio.</p>
<p>Si a nuestro juicio, fallas, o se sospecha que haz fallado, en el cumplimiento de cualquier t&eacute;rmino o disposici&oacute;n de estas Condiciones de Servicio, tambien podemos terminar este acuerdo en cualquier momento sin previo aviso, y seguir&aacute;s siendo responsable de todos los montos adeudados hasta inclu&iacute;da la fecha de terminaci&oacute;n; y/o en consecuencia podemos negarte el acceso a nuestros servicios (o cualquier parte del mismo).</p>
<h3>SECCI&Oacute;N 17 - ACUERDO COMPLETO</h3>
<p>Nuestra falla para ejercer o hacer valer cualquier derecho o disposici&ocirc;n de estas Condiciones de Servicio no constituir&aacute; una renucia a tal derecho o disposici&oacute;n.</p>
<p>Estas Condiciones del servicio y las pol&iacute;ticas o reglas de operaci&oacute;n publicadas por nosotros en este sitio o con respecto al servicio constituyen el acuerdo completo y el entendimiento entre tu y nosotros y rigen el uso del Servicio y reemplaza cualquier acuerdo, comunicaciones y propuestas anteriores o contempor&aacute;neas, ya sea oral o escrita, entre tu y nosotros (incluyendo, pero no limitado a, cualquier versi&oacute;n previa de los T&eacute;rminos de Servicio).</p>
<p>Cualquier ambig&uuml;edad en la interpretaci&oacute;n de estas Condiciones del servicio no se interpretar&aacute;n en contra del grupo de redacci&oacute;n.</p>
<br /><h3>SECCI&Oacute;N 18 - LEY</h3>
<p>Estas Condiciones del servicio y cualquier acuerdos aparte en el que te proporcionemos servicios se regir&aacute;n e interpretar&aacute;n en conformidad con las leyes de 
Cuartel General del Ejército
San Borja Lima, Peru.
</p>
<br /><h3>SECCI&Oacute;N 19 - CAMBIOS EN LOS T&Eacute;RMINOS DE SERVICIO</h3>
<p>Puedes revisar la versi&oacute;n m&aacute;s actualizada de los T&eacute;rminos de Servicio en cualquier momento en esta p&aacute;gina.</p>
<p>Nos reservamos el derecho, a nuestra sola discreci&oacute;n, de actualizar, modificar o reemplazar cualquier parte de estas Condiciones del servicio mediante la publicaci&oacute;n de las actualizaciones y los cambios en nuestro sitio web. Es tu responsabilidad revisar nuestro sitio web peri&oacute;dicamente para verificar los cambios. El uso cont&iacute;nuo de o el acceso a nuestro sitio Web o el Servicio despu&eacute;s de la publicaci&oacute;n de cualquier cambio en estas Condiciones de servicio implica la aceptaci&oacute;n de dichos cambios.</p>
<br /><h3>SECCI&Oacute;N 20 - INFORMACI&Oacute;N DE CONTACTO</h3>
<p>Preguntas acerca de los T&eacute;rminos de Servicio deben ser enviadas a (+51) 1644-9284.</p>
            </div>
        </div>
    </div>
</section>
<?php
require 'footer.php';
?>

<?php 
/*}
ob_end_flush();*/
?>
<script type="text/javascript" src="scripts/my_account_android.js"></script>