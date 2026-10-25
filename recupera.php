<?php
// Biblioteca de funciones externas
function recupera(&$f_min, &$f_max) {
    if (isset($_REQUEST['enviar'])) {
        $f_min = isset($_REQUEST['num1']) ? intval($_REQUEST['num1']) : 1;
        $f_max = isset($_REQUEST['num2']) ? intval($_REQUEST['num2']) : 16;
    } else {
        $f_min = 5;
        $f_max = 16;
    }
}
?>
