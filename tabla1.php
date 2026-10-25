<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actividad 1 - Tabla Dinámica</title>
    <style>
        table { border-collapse: collapse; text-align: center; font-family: sans-serif; }
        th, td { border: 1px solid #666; width: 35px; height: 35px; }
        .cabecera { background-color: #b19cd9; font-weight: bold; }
        .divisible { background-color: #ffff99; } /* Color amarillo para el divisor (*) */
        .no-divisible { background-color: #ffdab9; } /* Color naranja claro para el no divisor (-) */
    </style>
</head>
<body>

    <h2>Actividad 1: Creación dinámica de una tabla</h2>
    
    <table>
        <!-- Fila de cabecera con los números del 50 al 60 -->
        <tr class="cabecera">
            <th></th>
            <?php
            for ($col = 50; $col <= 60; $col++) {
                print("<th>$col</th>\n");
            }
            ?>
        </tr>

        <!-- Filas del 1 al 10 -->
        <?php
        for ($fila = 1; $fila <= 10; $fila++) {
            print("<tr>\n");
            // Celda de la cabecera de la fila
            print("<th class='cabecera'>$fila</th>\n");
            
            // Celdas interiores calculando si $col es divisible por $fila
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

</body>
</html>
