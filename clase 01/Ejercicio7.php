<?php
$num=0;
$pila = array();
for ($i = 0; $i < 10;) {

    if($num%2== 1){
        echo $num . "<br>";
        array_push($pila,$num);
        $i++;
    } 
    $num++;


}

?>