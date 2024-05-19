<?php
class AltaVenta{

    public static function validarStock(){
        if (isset($_POST["sabor"]) && isset($_POST["tipo"]) && isset($_POST["stock"]) && isset($_POST["mail"])){
            if (file_exists("Heladeria.json")){
                $encontrado = false;
                $heladeria = json_decode(file_get_contents("Heladeria.json"), true);
                foreach ($heladeria as &$helado){
                    if ($helado["sabor"] == $_POST["sabor"] and $helado["tipo"] == $_POST["tipo"] and $helado["stock"] >0 ){
                        $encontrado = true;
                        $helado["stock"] -= 1;
                        self::recorrer();
                        break;
                    }
                }
                if ($encontrado == false){
                    return "no existe";
                }else{
                    file_put_contents("heladeria.json", json_encode($heladeria));
                }

            }else{
                return "no existe el archivo";
            }
            }
        }
    public static function recorrer(){
        if (file_exists("ventas.json")){
            $ventaNueva = json_decode(file_get_contents("ventas.json"), true);
        }
        $ventaNueva=[];
        $fecha = Date("y-m-d");
        $venta = array(
            'id' => count($ventaNueva) +1,
            'fecha' => $fecha,
            'numeroPedido' => rand(1, 100),
            'sabor' => $_POST["sabor"],
            'vaso' => $_POST["vaso"],
            'mail' => $_POST["mail"],
        );

        $ventaNueva[] = $venta;
        if(file_put_contents("ventas.json", json_encode($ventaNueva))){
            self::agregarImg($fecha);
        }
    }

    public static function agregarImg($fecha){
        if ($_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
            $extension = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
            $nombre_archivo = $_POST['sabor'] . "_" . $_POST['tipo'] .  "_" . $_POST['vaso'] . "_" . $_POST['mail'] . "_" . $fecha . "."  . $extension;
            
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], 'ImagenesDeLasVentas/2024/' . $nombre_archivo)){
                echo "Imagen subida correctamente.";
            } else {
                echo "Hubo un error al subir la imagen.";
            }
        } else {
        
            echo "Error al cargar la imagen.";
        }
    }
    }
?>