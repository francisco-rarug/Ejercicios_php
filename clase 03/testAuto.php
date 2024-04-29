<?php
    include_once("Ejercicio19.php");
    $fecha = new DateTime();
    $auto =new Auto("Ferrari", "rojo");
    $auto2 = new Auto("Ferrari","rojo");
    $auto3 = new Auto("BMW","verde", 1000);
    $auto4 = new Auto("BMW","verde", 2000);
    $auto5 = new Auto("Ford","amarillo", 4000, $fecha->format("Y-m-d H:i:s"));

    $auto3 ->AgregarImpuestos(1500);
    $auto4 ->AgregarImpuestos(1500);
    $auto5 ->AgregarImpuestos(1500);

    $total = Auto::Add($auto, $auto2);
        echo "El importe sumado del primer objeto Auto más el segundo es: $total"."<br>";

    if ($auto->Equals($auto2)) {
        echo "El primer Auto es igual al segundo Auto"."<br>";
    } else {
        echo "El primer Auto no es igual al segundo Auto"."<br>";
    }
    
    if ($auto->Equals($auto5)) {
        echo "El primer Auto es igual al quinto Auto"."<br>";
    } else {
        echo "El primer Auto no es igual al quinto Auto"."<br>";
    }
    
    echo "Objetos impares:<br>";
    if ($auto->mostrarAuto()) {
        echo "<br>";
    }
    
    if ($auto3->mostrarAuto()) {
        echo "<br>";
    }
    
    if ($auto5->mostrarAuto()) {
        echo "<br>";
    }

    $auto->guardarAutoEnCSV("Autos.csv");
    $auto2->guardarAutoEnCSV("Autos.csv");
    $auto3->guardarAutoEnCSV("Autos.csv");
    $auto4->guardarAutoEnCSV("Autos.csv");
    $auto5->guardarAutoEnCSV("Autos.csv");

    $autosDesdeCSV = $auto->leerAutosDesdeCSV("Autos.csv");
    
?>