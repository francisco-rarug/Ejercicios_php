<?php

    /* Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
    distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
    año es. Utilizar una estructura selectiva múltiple. */

    $a = 4;
    $b = 5;
    $c = 3;

    if (($a < $b && $a > $c) || ($a > $b && $a < $c)) {
        echo "el numero del medio es ". $a;
    }
    elseif (($b < $a && $b > $c) || ($b > $a && $b < $c)) {
        echo "el numero del medio es ". $b;
    }
    elseif (($c < $a && $c > $b) || ($c > $a && $c < $b)) {
        echo "el numero del medio es ". $c;
    } else {
        echo "No hay valor del medio";
    }

    
?>