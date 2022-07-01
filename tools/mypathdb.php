<?php
//  ======== conexion a nuestra base de datos ==========
$serverName = "localhost";
$userName = "root"; //root
$password = "";
$dbName = "sistema";
//$dbName = "cursoprogramacion";

// ======= crear la conexion =======
$conn = mysqli_connect($serverName, $userName, $password, $dbName);

// ======= chequear la conexion ========
if (!$conn) {
	$data = array("error" => '3');
	die(json_encode($data));
}
?>