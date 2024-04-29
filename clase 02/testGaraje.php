<?php

    include_once("Ejercicio17.php");
    include_once("Ejercicio18.php");

    $auto1 = new Auto("rojo", "ferrari");
    $garaje1 = new Garaje("Garaje", 1500,  $auto1);

    $garaje1 ->Add($auto1)
    

?>