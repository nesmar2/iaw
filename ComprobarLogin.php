<?php
require 'cabecera.php';

$nombre = $_POST['nombre'];
// Las contraseñas en la BD están en MD5 según los requisitos de la tarea
$clave = md5($_POST['clave']);

// Uso de sprintf tal como solicita el enunciado
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
