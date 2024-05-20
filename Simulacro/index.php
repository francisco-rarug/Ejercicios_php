<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")  {

    if ($_POST ["option"] == "HeladeriaAlta"){
        include_once("HeladeriaAlta.php");
        HeladeriaAlta::actualizarJson();

    }elseif($_POST ["option"] == "HeladoConsultar"){
        include_once("HeladoConsultar.php");
        echo HeladoConsultar::comprobacion();

    }elseif($_POST ["option"] == "AltaVenta"){
        include_once("AltaVenta.php");
        echo AltaVenta::validarStock();
    }

}elseif ($_SERVER["REQUEST_METHOD"] == "GET"){
    if($_GET ["option"] == "ConsultasVentas"){
        include_once("ConsultasVentas.php");
        ConsultasVentas::VentasHelados($_GET["valor"], $_GET["fecha"], $_GET["fecha2"]);
    }
}


?>