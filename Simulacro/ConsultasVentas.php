<?php
class ConsultasVentas {

    public static function VentasHelados($valor, $fecha = null, $fecha2=null) {

        if (is_null($fecha)) {
            $fecha = date('Y-m-d', strtotime('-1 day'));
        }
        
        $ventas = json_decode(file_get_contents("ventas.json"), true);
        $contador = 0;
        $ventasPorUsuario = [];
        $ventasPorSabor = [];
        $ventasPorVaso = [];
        $ventasFecha=[];

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




            if (isset($_GET["fecha"]) and isset($_GET["fecha2"])){
                if ($fecha2 > $fecha){
                    if ($venta["fecha"] < $fecha2 and $venta["fecha"] > $fecha ){
                        $ventasFecha[] = $venta;
                    }
                }else{
                    if ($venta["fecha"] > $fecha2 and $venta["fecha"] < $fecha ){
                        $ventasFecha[] = $venta;
                    }
                }
            }
        }

        function ordenarPorMailAscendentemente($ventasFecha) {

            $mails = array_column($ventasFecha, 'mail');

            // Usamos array_multisort para ordenar el array multidimensional
            array_multisort($mails, SORT_ASC, $ventasFecha);
        
            // Devolvemos el array ordenado
            return $ventasFecha;
        }

        
        $ventasFechaOrdenadas = ordenarPorMailAscendentemente($ventasFecha);

        print_r($ventasFechaOrdenadas);


        echo "Total ventas en la fecha $fecha: " . $contador . PHP_EOL;

        echo "Ventas por usuario: " . PHP_EOL;
        //var_dump($ventasPorUsuario);

        echo "Ventas por sabor: " . PHP_EOL;
        //var_dump($ventasPorSabor);

        echo "Ventas por vaso (cucurucho): " . PHP_EOL;
        //var_dump($ventasPorVaso);
        
        var_dump($ventasFecha);
    }
}
