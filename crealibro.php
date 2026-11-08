<?php
require 'cabecera.php';

// Fase de depuración recomendada (mostrar POST)
// echo "<pre>"; print_r($_POST); echo "</pre>";

$nombre = $_POST['nombre'];
$autor = $_POST['autor'];
$isbn = $_POST['isbn'];
$puntuacion = $_POST['puntuacion'];
$genero = $_POST['genero'];

// 1. Comprobar si ya existe un libro con el mismo ISBN
$sql_check = sprintf(
    "SELECT * FROM libros WHERE isbn = '%s'",
    mysqli_real_escape_string($conexion, $isbn)
);
$res_check = mysqli_query($conexion, $sql_check);

if (mysqli_num_rows($res_check) > 0) {
    echo "<p style='color:red;'>Error: Ya existe un libro registrado con el ISBN: " . htmlspecialchars($isbn) . "</p>";
    echo '<a href="FormLibros.html">Volver al formulario</a>';
} else {
    // 2. Insertar el libro si no existe
    $sql_insert = sprintf(
        "INSERT INTO libros (nombre, autor, isbn, puntuacion, genero) VALUES ('%s', '%s', '%s', %d, '%s')",
        mysqli_real_escape_string($conexion, $nombre),
        mysqli_real_escape_string($conexion, $autor),
        mysqli_real_escape_string($conexion, $isbn),
        (int)$puntuacion,
        mysqli_real_escape_string($conexion, $genero)
    );

    if (mysqli_query($conexion, $sql_insert)) {
        echo "<p style='color:green;'>¡Libro registrado con éxito!</p>";
        echo '<a href="FormLibros.html">Añadir otro libro</a> | <a href="muestra_libros.php">Ver catálogo</a>';
    } else {
        echo "<p style='color:red;'>Error al insertar: " . mysqli_error($conexion) . "</p>";
    }
}

mysqli_close($conexion);
?>
