<?php
require 'cabecera.php';

// Comprobar si se ha enviado una puntuación por POST para filtrar
$puntuacion_filtro = isset($_POST['puntuacion']) ? $_POST['puntuacion'] : '';

if ($puntuacion_filtro === '' || $puntuacion_filtro === 'todos') {
    $sql = "SELECT * FROM libros";
} else {
    $sql = sprintf(
        "SELECT * FROM libros WHERE puntuacion = %d",
        (int)$puntuacion_filtro
    );
}

$resultado = mysqli_query($conexion, $sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mostrar Libros</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Mostrar llibres</h2>
    
    <!-- Formulario de búsqueda en la misma página -->
    <form action="muestra_libros.php" method="POST">
        <label>Puntuació:</label>
        <select name="puntuacion">
            <option value="todos">Todos</option>
            <option value="1" <?php if($puntuacion_filtro=='1') echo 'selected'; ?>>1</option>
            <option value="2" <?php if($puntuacion_filtro=='2') echo 'selected'; ?>>2</option>
            <option value="3" <?php if($puntuacion_filtro=='3') echo 'selected'; ?>>3</option>
            <option value="4" <?php if($puntuacion_filtro=='4') echo 'selected'; ?>>4</option>
            <option value="5" <?php if($puntuacion_filtro=='5') echo 'selected'; ?>>5</option>
        </select>
        <input type="submit" value="Envia">
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Autor</th>
            <th>ISBN</th>
            <th>Puntuació</th>
            <th>Gènere</th>
        </tr>
        <?php
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $fila['id'] . "</td>";
                echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['autor']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['isbn']) . "</td>";
                echo "<td>" . $fila['puntuacion'] . "</td>";
                echo "<td>" . htmlspecialchars($fila['genero']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No se encontraron libros.</td></tr>";
        }
        ?>
    </table>
</body>
</html>
<?php mysqli_close($conexion); ?>
