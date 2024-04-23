<?php
$lapicera = array(
    array(
        'color' => 'Azul',
        'marca' => 'Bic',
        'trazo' => 'Fino',
        'precio' => 1.5
    ),
    array(
        'color' => 'Rojo',
        'marca' => 'Pilot',
        'trazo' => 'Medio',
        'precio' => 2.0
    ),
    array(
        'color' => 'Negro',
        'marca' => 'Faber-Castell',
        'trazo' => 'Grueso',
        'precio' => 1.8
    )
);

foreach ($lapicera as $index => $detalles) {
    echo "Lapicera " . ($index + 1) . ":\n";
    echo "Color: " . $detalles['color'] . "\n";
    echo "Marca: " . $detalles['marca'] . "\n";
    echo "Trazo: " . $detalles['trazo'] . "\n";
    echo "Precio: $" . $detalles['precio'] . "\n\n";
}
?>
