<?php

class DevolverHelado
{

    public static function devolver()
    {
        if (isset($_POST['nroPedido']) && isset($_POST['causa'])) {
            if (file_exists("ventas.json")) {
                $ventas = json_decode(file_get_contents("ventas.json"), true);
                $bandera = false;
                foreach ($ventas as $venta) {
                    if ($venta["id"] == $_POST['nroPedido']) {
                        self::agregarImg();
                        self::cuponDescuento();
                        self::devolucion();
                    }
                }
            }
        }
    }

    public static function agregarImg()
    {
        if ($_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
            $extension = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
            $nombre_archivo = $_POST['nroPedido'] . "." . $extension;

            if (move_uploaded_file($_FILES['imagen']['tmp_name'], 'devolucion/' . $nombre_archivo)) {
                echo "Imagen subida correctamente.";
            } else {
                echo "Hubo un error al subir la imagen.";
            }
        } else {

            echo "Error al cargar la imagen.";
        }
    }

    public static function cuponDescuento()
    {
        $bandera=true;
        if (file_exists("cupones.json")) {
            $descuentos = json_decode(file_get_contents("cupones.json"), true);
            foreach($descuentos as $decuento){
                if ($decuento['idDevolucion']==$_POST['nroPedido']) {
                    $bandera = false;
                    break;
                }
            }
        }else {
            $descuentos=[]; 
        }
        if ($bandera == true) {
            $descuentoNuevo = array(
                'id' => count($descuentos) + 1,
                'idDevolucion' => $_POST['nroPedido'],
                'descuento' => 10,
                'estado' => 'no usado'
            );
            $descuentos[] = $descuentoNuevo;
            file_put_contents("cupones.json", json_encode($descuentos));
        }
        }

        public static function devolucion()
        {
            $bandera=true;
            if (file_exists("devolucion.json")) {
                $devolucion = json_decode(file_get_contents("devolucion.json"), true);
                foreach($devolucion as $devoluciones){
                    if ($devoluciones['idDevolucion']==$_POST['nroPedido']) {
                        $bandera = false;
                        break;
                    }
                }
            }else {
                $devolucion=[]; 
            }
            if ($bandera == true) {
                $devolucionNuevo = array(
                    'id' => count($devolucion) + 1,
                    'idDevolucion' => $_POST['nroPedido'],
                    'motivo' => $_POST['causa']
                );
                $devolucion[] = $devolucionNuevo;
                file_put_contents("devolucion.json", json_encode($devolucion));
            }
            }
    }

