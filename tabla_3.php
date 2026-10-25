<?php
// Incluimos el archivo externo que contiene la función recupera utilizando require
require("recupera.php");

$inicio = 1;
$fin = 10;

// Ejecutamos la función importada
recupera($inicio, $fin);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actividad 3 - Modularización con Include/Require</title>
    <style>
        table { border-collapse: collapse; text-align: center; font-family: sans-serif; }
        th, td { border: 1px solid #666; width: 35px; height: 35px; }
        .cabecera { background-color: #b19cd9; font-weight: bold; }
        .divisible { background-color: #c8e6c9; }
        .no-divisible { background-color: #e8f5e9; }
    </style>
</head>
<body>

    <h2>Actividad 3: Versión Modularizada (Usando require/include)</h2>
    
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
