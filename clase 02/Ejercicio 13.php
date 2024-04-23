<?php

    function validarPalabra($palabra, $max){
        if (strlen($palabra) > $max){
            return 0;
        }

        $palabrasValidas = array ("Recuperatorio", "parcial", "programacion");

        foreach ($palabrasValidas as $palabraValida) {
            if ($palabra === $palabraValida) {
                return 1; 
            }
        }
        
        return 0; 
    }

    $palabra1 = "Recuperatorio";
    $palabra2 = "Final";
    $max = 15;

    $resultado1 = validarPalabra($palabra1, $max);
    $resultado2 = validarPalabra($palabra2, $max);

    echo "Resultado 1: " . $resultado1 . "<br>";
    echo "Resultado 2: " . $resultado2 . "<br>"; 
?>