<?php
// Modulo ajax para contacto
$nombre = utf8_decode($_POST['nombre']);
$correo = strtolower($_POST['correo']);
$telefono = $_POST['telefono'];

// === Introducir los datos en la tabla contactos =====
require_once('../../tools/mypathdb.php');
require_once('../../ruta.php');

// ======= Introducir los datos en la tabla contactos =======
$sql = "INSERT INTO contactos (nombre, correo, telefono) 
VALUES ('" . $nombre . "','" . $correo . "','" . $telefono . "')"; 

if (mysqli_query($conn, $sql)) 
{
	// Los datos se han incluido correctamente
	// === Enviar un correo notificando que alguien completó el formulario ===
	$destino = "gustavoarias@outlook.com";
	$asunto = "Contacto web sistema";
	$cabeceras = "Content-type: text/html";
	$cuerpo = "<h2>Hola, un usuario te ha contactado por el website!</h2>
	Hemos recibido la siguiente información:<br>
	<b>Nombre: </b> $nombre<br>
	<b>Correo: </b> $correo<br>
	<b>teléfono: </b> $telefono<br>
	<br><br>
	Sistema web<br>
	<img src=<?php echo SERVER ?>img/logo.png />
	<p>&nbsp;</p>
	<h5>Desarrollado <br>
	Copyright © 2019. Todos los derechos reservados. Version 1.0.0 <br></h5>
	";
	$yourWebsite = "nombredeldominio.com";
	$yourEmail = "info@nombredeldominio.com";
	$cabeceras = "From: $yourWebsite <$yourEmail>\n" . "Content-type: text/html";
	//mail($destino,$asunto,$cuerpo,$cabeceras);

	// ===== envio de correo al cliente =======
	$destino = $correo;
	$asunto = "Bienvenido al sistema web";
	$cabeceras = "Content-type: text/html";
	$cuerpo = "<h2>Apreciado cliente, $nombre </h2><br>
	Gracias por contactárnos. <br>
	Hemos recibido su información y uno de nuestros agentes lo atenderá pronto. <br>
	Mientras tanto, puede visitar nuestras redes sociales y conocernos un poco más.<br><br><br>
	<a href=https://www.facebook.com/gustabin2.0>
	<img src=<?php echo SERVER ?>img/logoFacebook.jpg alt=Logo Facebook height=50px width=50px></a>
	<br>Atentamente,<br>
	El equipo del sistema web<br>
	<a href=<?php echo SERVER ?>><img src=<?php echo SERVER ?>img/logo.png /></a>
	<br>
	<h5>Desarrollado <br>
	Copyright © 2019. Todos los derechos reservados. Version 1.0.0 <br></h5>
	";
	$yourWebsite = "nombredeldominio.com";
	$yourEmail = "info@nombredeldominio.com";
	$cabeceras = "From: $yourWebsite <$yourEmail>\n" . "Content-type: text/html";
	//mail($destino,$asunto,$cuerpo,$cabeceras);

	//== envio de informacion al ajax
	$data = array ("exito" => '1');
	die(json_encode($data));
} else {
	// ========== ocurrio un error ===========
	mysqli_close($conn);
	$data = array("error" => '1');
	die(json_encode($data));
}
?>