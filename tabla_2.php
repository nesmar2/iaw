<?php
// Función requerida llamada 'recupera' para gestionar los datos del formulario de forma reutilizable
function recupera(&$f_min, &$f_max) {
    if (isset($_REQUEST['enviar'])) {
        $f_min = isset($_REQUEST['num1']) ? intval($_REQUEST['num1']) : 1;
        $f_max = isset($_REQUEST['num2']) ? intval($_REQUEST['num2']) : 16;
    } else {
        // Valores por defecto si se accede sin enviar el formulario
        $f_min = 5;
        $f_max = 16;
    }
}

// Variables para almacenar el rango de filas
$inicio = 1;
$fin = 10;

// Llamamos a la función recupera pasando las variables por referencia
recupera($inicio, $fin);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actividad 2 - Tabla Dinámica con Función</title>
    <style>
        table { border-collapse: collapse; text-align: center; font-family: sans-serif; }
        th, td { border: 1px solid #666; width: 35px; height: 35px; }
        .cabecera { background-color: #b19cd9; font-weight: bold; }
        .divisible { background-color: #c8e6c9; } /* Verde claro acorde al ejemplo */
        .no-divisible { background-color: #e8f5e9; }
    </style>
</head>
<body>

    <h2>Actividad 2: Tabla generada desde Fila <?php echo $inicio; ?> hasta <?php echo $fin; ?></h2>
    
    <table>
        <tr class="cabecera">
            <th></th>
            <?php
            for ($col = 50; $col <= 60; $col++) {
                print("<th>$col</th>\n");
            }
            ?>
        </tr>

        <?php
        for ($fila = $inicio; $fila <= $fin; $fila++) {
            print("<tr>\n");
            print("<th class='cabecera'>$fila</th>\n");
            
            for ($col = 50; $col <= 60; $col++) {
                if ($col % $fila == 0) {
                    print("<td class='divisible'>*</td>\n");
                } else {
                    print("<td class='no-divisible'>-</td>\n");
                }
            }
            print("</tr>\n");
        }
        ?>
    </table>
    <br>
    <a href="tabla_2.html">Volver al formulario</a>

</body>
</html>
