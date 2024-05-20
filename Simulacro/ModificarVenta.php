<?php
class ModificarVenta
{

    public static function modificarVenta($id, $mail, $sabor, $vaso)
    {
        $ventas = json_decode(file_get_contents("ventas.json"), true);
        
        $bandera = false;
        foreach ($ventas as &$venta) {
            if (
                $venta["id"] == $id && $venta["mail"] == $mail &&
                $venta["sabor"] == $sabor  && $venta["vaso"] == $vaso
            ) {
                $venta["mail"] = "nuevo@gmail.com";
                $venta["sabor"] = "nuevoSabor";
                $venta["tipo"] = "nuevoTipo";
                $venta["vaso"] = "nuevoVaso";
                $bandera = true;
                break;
            }
        }
        if ($bandera == false) {
            echo "no existe ese numero de pedido";
        }else{
        if (file_put_contents("ventas.json", json_encode($ventas))) {
            echo "archivos modificados";
        }
    }
    }
}
