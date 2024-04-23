<?php

$suma = 0;
$numeros_sumados = 0;

for ($i = 1; $suma + $i <= 1000; $i++) {
    $suma += $i;
    echo $i . " ";
    $numeros_sumados++;
}

echo "\n Total de números sumados: " . $numeros_sumados;
?>