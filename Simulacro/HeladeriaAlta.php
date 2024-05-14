<?php
class HeladeriaAlta {
    private $sabor;
    private $precio;
    private $tipo;
    private $vaso;
    private $stock;

    public function __construct($sabor, $precio, $tipo, $vaso, $stock) {
        $this->sabor = $sabor;
        $this->precio = $precio;
        $this->tipo = $tipo;
        $this->vaso = $vaso;
        $this->stock = $stock;
    }

    public static function convertirAJson(HeladeriaAlta $helado) {
        $heladeria = array(
            'sabor' => $helado->sabor,
            'precio' => $helado->precio,
            'tipo' => $helado->tipo,
            'vaso' => $helado->vaso,
            'stock' => $helado->stock
        );

        $archivo = "heladeria.json";
        $contenido_json = [];

        if (file_exists($archivo)) {
            $contenido_json = json_decode(file_get_contents($archivo), true);
        }
        $encontrado = false;
        if (!empty($contenido_json)) { 
            foreach ($contenido_json as $helado_existente) { 
                if ($helado_existente['sabor'] == $helado->sabor && $helado_existente['tipo'] == $helado->tipo) {
                    $helado_existente['precio'] = $helado->precio;
                    $helado_existente['stock'] += $helado->stock;
                    $encontrado = true;
                    break;
                }
            }
        }

        if (!$encontrado) {
            $contenido_json[] = $heladeria;
        }
        file_put_contents($archivo, json_encode($contenido_json));
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sabor"]) && isset($_POST["precio"]) && isset($_POST["tipo"]) && isset($_POST["vaso"]) && isset($_POST["stock"])) {
    $nuevoHelado = new HeladeriaAlta($_POST["sabor"], $_POST["precio"], $_POST["tipo"], $_POST["vaso"], $_POST["stock"]);
    HeladeriaAlta::convertirAJson($nuevoHelado);
}

if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $nombre_temporal = $_FILES['imagen']['tmp_name'];
    $nombre_archivo = $_FILES['imagen']['name'];
    $ruta_destino = './ImagenesHelados/' . $nombre_archivo;

    if (move_uploaded_file($nombre_temporal, $ruta_destino)) {
        echo "Imagen subida correctamente.";
    } else {
        echo "Hubo un error al subir la imagen.";
    }
} else {
    echo "Error al cargar la imagen.";
}
?>
