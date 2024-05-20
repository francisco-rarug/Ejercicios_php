<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST["option"] == "HeladeriaAlta") {
        include_once("HeladeriaAlta.php");
        HeladeriaAlta::actualizarJson();
    } elseif ($_POST["option"] == "HeladoConsultar") {
        include_once("HeladoConsultar.php");
        echo HeladoConsultar::comprobacion();
    } elseif ($_POST["option"] == "AltaVenta") {
        include_once("AltaVenta.php");
        echo AltaVenta::validarStock();
    }elseif ($_POST["option"]=="DevolverHelado") {
        include_once("DevolverHelado.php");
        DevolverHelado::devolver();
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
    if ($_GET["option"] == "ConsultasVentas") {
        include_once("ConsultasVentas.php");
        ConsultasVentas::VentasHelados($_GET["valor"], $_GET["fecha"], $_GET["fecha2"]);
    }
    
} elseif ($_SERVER["REQUEST_METHOD"] == "PUT") {

    if (isset($_GET['option'])) {
    
        if ($_GET["option"] == "ModificarVenta") {

            parse_str(file_get_contents("php://input"), $putData);
            foreach($putData as $s){
                echo $s;
            }
            if (
                isset($putData["id"]) &&
                isset($putData["mail"]) && isset($putData["sabor"]) && isset($putData["vaso"]))
            {
                echo"hoplasaw";
                include_once("ModificarVenta.php");
                ModificarVenta ::modificarVenta($putData["id"], $putData["mail"], $putData["sabor"], $putData["tipo"], $putData["vaso"]);
            }
        }
    }
}
