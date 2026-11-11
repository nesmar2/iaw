<?php
require 'cabecera.php';

// Filtro por nombre o campos si lo requieres, mantenemos la estructura simple
$sql = "SELECT * FROM libros";
$resultado = mysqli_query($conexion, $sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mostrar llibres</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #000;
            margin: 20px;
        }
        h2 {
            font-size: 20px;
            margin-bottom: 10px;
        }
        form {
            margin-bottom: 20px;
            font-size: 14px;
        }
        input, select {
            padding: 3px;
            margin-right: 15px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        td {
            padding: 6px 10px;
            vertical-align: top;
        }
    </style>
</head>
<body>

<h2>Mostrar llibres</h2>

<form action="muestra_libros.php" method="POST">
    Nom <input type="text" name="nom">
    Autor <input type="text" name="autor">
    ISBN <input type="text" name="isbn" size="15">
    Puntuació 
    <select name="puntuacion">
        <option value="">-</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    Genere <input type="text" name="genero" size="12">
    <input type="submit" value="Envia">
</form>

<table>
    <?php if ($resultado && mysqli_num_rows($resultado) > 0): ?>
        <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
            <tr>
                <td><?php echo $fila['id']; ?></td>
                <td><strong><?php echo htmlspecialchars($fila['nombre']); ?></strong></td>
                <td><?php echo htmlspecialchars($fila['autor']); ?></td>
                <td><?php echo htmlspecialchars($fila['isbn']); ?></td>
                <td><?php echo (int)$fila['puntuacion']; ?></td>
                <td><?php echo htmlspecialchars($fila['genero']); ?></td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="6">No hay libros registrados.</td>
        </tr>
    <?php endif; ?>
</table>

</body>
</html>
<?php mysqli_close($conexion); ?>
