<?php
$servidor = "localhost";
$userBD = "root";
$passwdBD = "root"; // Pon la contraseña de tu base de datos si es distinta
$nomBD = "biblioteca";

$conexion = mysqli_connect($servidor, $userBD, $passwdBD, $nomBD);

if (!$conexion) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}
mysqli_set_charset($conexion, "utf8");
?>
