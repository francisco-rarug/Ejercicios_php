<?php

$lapiceras_asociativo = array(
    'lapicera1' => array(
        'color' => 'Azul',
        'marca' => 'Bic',
        'trazo' => 'Fino',
        'precio' => 1.5
    ),
    'lapicera2' => array(
        'color' => 'Rojo',
        'marca' => 'Pilot',
        'trazo' => 'Medio',
        'precio' => 2.0
    ),
    'lapicera3' => array(
        'color' => 'Negro',
        'marca' => 'Faber-Castell',
        'trazo' => 'Grueso',
        'precio' => 1.8
    )
);

$lapiceras_indexado = array(
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

echo "Array asociativo de Arrays:\n";
foreach ($lapiceras_asociativo as $key => $lapicera) {
    echo "Lapicera " . $key . ":\n";
    echo "Color: " . $lapicera['color'] . "\n";
    echo "Marca: " . $lapicera['marca'] . "\n";
    echo "Trazo: " . $lapicera['trazo'] . "\n";
    echo "Precio: $" . $lapicera['precio'] . "\n\n";
}

echo "\nArray indexado de Arrays:\n";
foreach ($lapiceras_indexado as $index => $lapicera) {
    echo "Lapicera " . ($index + 1) . ":\n";
    echo "Color: " . $lapicera['color'] . "\n";
    echo "Marca: " . $lapicera['marca'] . "\n";
    echo "Trazo: " . $lapicera['trazo'] . "\n";
    echo "Precio: $" . $lapicera['precio'] . "\n\n";
}
?>
