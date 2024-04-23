<?php

    $palabras = array("hola", "independiente");
    function invertirArray($palabrasInvertidas) {
        $contador = 0;

        foreach($palabrasInvertidas as $invertido) {
            $palabrasInvertidas[$contador] = strrev($invertido);
            echo $palabrasInvertidas[$contador]."<br>";
            $contador ++;
    }
}
invertirArray($palabras);
     
?>