<?php
$num = 40;

if ($num >= 20 && $num <= 60) {
    $unidades = array("", "uno", "dos", "tres", "cuatro", "cinco", "seis", "siete", "ocho", "nueve");
    $decenas = array("", "diez", "veinte", "treinta", "cuarenta", "cincuenta", "sesenta");

    $unidad = $num % 10;
    $decena = floor($num / 10);

    $palabras = $decenas[$decena];
    if ($unidad > 0) {
        $palabras .= " y " . $unidades[$unidad];
    }

    echo $palabras;
} else {
    echo "Número fuera de rango (20-60)";
}
?>
