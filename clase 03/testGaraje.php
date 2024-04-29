<?php

    include_once("Ejercicio19.php");
    include_once("Ejercicio20.php");

    $auto1 = new Auto("rojo", "ferrari");
    $auto2 = new Auto("verde", "bmw");
    $autos = [$auto1, $auto2];

    $garaje1 = new Garaje("Garaje", 1500, $autos);

    $auto3 = new Auto("azul", "audi");
    $garaje1->Add($auto3);
    
    $garaje1->guardarGarajeEnCSV("garajes.csv");

    $garajeDesdeCSV = $garaje1->leerGarageCsv("garajes.csv");


    

?>