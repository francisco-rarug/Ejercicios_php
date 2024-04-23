<?php

$elementos = array();
for ($i = 0; $i < 5; $i++) {
    $elementos[$i] = rand(1, 10);
}


$suma = 0;
foreach ($elementos as $numero) {
    $suma += $numero;
}

$promedio = $suma / count($elementos);

if ($promedio > 6) {
    echo "El promedio de los números es mayor que 6.";
} elseif ($promedio < 6) {
    echo "El promedio de los números es menor que 6.";
} else {
    echo "El promedio de los números es igual a 6.";
}

?>
