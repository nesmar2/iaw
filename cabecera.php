<?php
$servidor = "localhost";
$userBD = "iaw";
$passwdBD = "iaw";
$nomBD = "biblioteca";

$conexion = mysqli_connect($servidor, $userBD, $passwdBD, $nomBD);

if (!$conexion) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}
mysqli_set_charset($conexion, "utf8");
?>
