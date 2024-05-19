<?php
class HeladeriaAlta {
    public static function AgregarAJson(){
        if (isset($_POST["sabor"]) && isset($_POST["precio"]) && isset($_POST["tipo"]) && isset($_POST["vaso"]) && isset($_POST["stock"])){
            $heladoNuevo=[];
            if (file_exists("Heladeria.json")){
                $heladoNuevo = json_decode(file_get_contents("Heladeria.json"), true);
            }
            $heladeria = array(
                'id' => count($heladoNuevo) +1,
                'sabor' => $_POST["sabor"],
                'precio' => $_POST["precio"],
                'tipo' => $_POST["tipo"],
                'vaso' => $_POST["vaso"],
                'stock' => $_POST["stock"]
            );
            $heladoNuevo[] = $heladeria;
            file_put_contents("Heladeria.json", json_encode($heladoNuevo));

            self::agregarImg();
        }
    }

    public static function agregarImg(){
        if ($_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
            $extension = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
            $nombre_archivo = $_POST['sabor'] . "_" . $_POST['tipo'] . "." . $extension;
            
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], 'ImagenesHelados/2024/' . $nombre_archivo)){
                echo "Imagen subida correctamente.";
            } else {
                echo "Hubo un error al subir la imagen.";
            }
        } else {
        
            echo "Error al cargar la imagen.";
        }
    }
    public static function actualizarJson(){
        if (file_exists("Heladeria.json")){
            $encontrado = false;
            $heladeria = json_decode(file_get_contents("Heladeria.json"), true);
            foreach ($heladeria as &$helado){
                if ($helado["sabor"] == $_POST["sabor"] and $helado["tipo"] == $_POST["tipo"]){
                    $helado["precio"] = rand(0, 1000);
                    $helado["stock"] += 1;
                    $encontrado =true;
                    break;
                }
            }
            if ($encontrado == false){
                self:: AgregarAJson();
            }
            else{
                file_put_contents("Heladeria.json", json_encode($heladeria));
            }
        }else{
            self::AgregarAJson();
        }
    }
    
    
}


?>
