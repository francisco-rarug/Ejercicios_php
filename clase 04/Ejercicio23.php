<?php
class Registro {
    private $_nombre;
    private $_clave;
    private $_mail;
    private $_id;
    private $_fecha;
    
    public function __construct($nombre, $clave, $mail, $id, $fecha) {
        $this->_nombre = $nombre;
        $this->_clave = $clave;
        $this->_mail = $mail;
        $this->_id = $id;
        $this->_fecha = $fecha;
    }

    public static function convertirAJson(Registro $nuevoUsuario) {
        $archivo = fopen("usuarios.json","a");
        
        $usuario = array(
            'nombre' => $nuevoUsuario->_nombre,
            'clave' => $nuevoUsuario->_clave,
            'mail' => $nuevoUsuario->_mail,
            'id' => $nuevoUsuario->_id,
            'fecha' => $nuevoUsuario->_fecha->format("d-m-Y H:i:s")
        );

        fwrite($archivo, json_encode($usuario) . PHP_EOL);
        fclose($archivo);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nombre"]) && isset($_POST["clave"]) && isset($_POST["mail"])) {
    $id = rand(1, 1000);
    $fecha = new DateTime();
    
    $nuevoUsuario = new Registro($_POST["nombre"], $_POST["clave"], $_POST["mail"], $id, $fecha);
}

if ($_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $nombre_temporal = $_FILES['imagen']['tmp_name'];
    $nombre_archivo = $_FILES['imagen']['name'];
    $ruta_destino = './Fotos/' . $nombre_archivo;

    if (move_uploaded_file($nombre_temporal, $ruta_destino)) {
        echo "Imagen subida correctamente.";
    } else {
        echo "Hubo un error al subir la imagen.";
    }
} else {
    echo "Error al cargar la imagen.";
}

Registro::convertirAJson($nuevoUsuario);
?>
