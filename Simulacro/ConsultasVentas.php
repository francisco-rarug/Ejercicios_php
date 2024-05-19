<?php
class ConsultasVentas {

    public static function VentasHelados($valor, $fecha = null) {
        if (is_null($fecha)) {
            $fecha = date('Y-m-d', strtotime('-1 day'));
        }
        
        $ventas = json_decode(file_get_contents("ventas.json"), true);
        $contador = 0;
        $ventasPorUsuario = [];
        $ventasPorSabor = [];
        $ventasPorVaso = [];

        foreach ($ventas as $venta) {
            if ($venta["fecha"] == $fecha) {
                $contador++;
            }
            
            if (isset($venta["mail"]) && $venta["mail"] == $valor) {
                $ventasPorUsuario[] = $venta;
            }
            if (isset($venta["sabor"]) && $venta["sabor"] == $valor) {
                $ventasPorSabor[] = $venta;
            }
            if (isset($venta["vaso"]) && $venta["vaso"] == $valor && $valor == "cucurucho") {
                $ventasPorVaso[] = $venta;
            }
        }

        echo "Total ventas en la fecha $fecha: " . $contador . PHP_EOL;

        echo "Ventas por usuario: " . PHP_EOL;
        var_dump($ventasPorUsuario);

        echo "Ventas por sabor: " . PHP_EOL;
        var_dump($ventasPorSabor);

        echo "Ventas por vaso (cucurucho): " . PHP_EOL;
        var_dump($ventasPorVaso);
    }
}
