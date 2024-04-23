<?php
    /* Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
    distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
    año es. Utilizar una estructura selectiva múltiple.*/

    date_default_timezone_set('MST');
    
    $fecha_actual = date("d-m-y");

    $formato1 = date("d-m-Y H:i:s");
    $formato2 = date("d/m/Y");
    $formato3 = date("1, j F Y");

    $mes_actual=date("n");

    $estacion="";

    switch ($mes_actual){
        case 1:
        case 2:
        case 12:
            $estacion = "Es verano";
            break;
        case 3:
        case 4:
        case 5:
            $estacion = "Es otoño";
            break;
        case 6:
        case 7:
        case 8:
            $estacion = "Es invierno";
            break;
        case 9:
        case 10:
        case 11:
            $estacion = "Es primavera";
            break;
        }
    
        echo "Formato 1 " . $formato1;
        echo "<br>";
        echo "Formato 2 " . $formato2;
        echo "<br>";
        echo "Formato 3 " . $formato3;
        echo "<br>";
        echo "La estacion del año es: " . $estacion

?>