<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'cabecera.php';

$nombre = $_POST['nombre'];

$clave = md5($_POST['clave']);


$sql = sprintf(
    "SELECT * FROM usuarios WHERE nombre = '%s' AND clave = '%s'",
    mysqli_real_escape_string($conexion, $nombre),
    mysqli_real_escape_string($conexion, $clave)
);

$resultado = mysqli_query($conexion, $sql);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $usuario = mysqli_fetch_assoc($resultado);
    echo "<h2>¡Bienvenido, " . htmlspecialchars($usuario['nombre']) . "!</h2>";
    echo "<p>Autenticación correcta. Tipo de usuario: " . $usuario['tipo'] . "</p>";
} else {
    echo "<h2>Acceso denegado</h2>";
    echo "<p>Usuario o contraseña incorrectos.</p>";
    echo '<a href="login.html">Volver a intentar</a>';
}

mysqli_close($conexion);
?>
