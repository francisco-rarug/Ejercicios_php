<?php
class Usuario{
    private $_nombre;
    private $_clave;
    private $_mail;

    public function __construct($nombre, $clave, $mail){
        $this->_nombre = $nombre;
        $this->_clave = $clave;
        $this->_mail = $mail;
    }

    public function getNombre(){
        return $this->_nombre;
    }

    public function getClave(){
        return $this->_clave;
    }

    public function getMail(){
        return $this->_mail;
    }


    public function verificarUsuario($clave, $mail){
        if ($mail === $this->_mail) {
            if ($clave === $this->_clave) {
                return "Verificado";
            } else {
                return "Error en los datos";
            }
        } else {
            return "Usuario no registrado";
        }
    }

    public static function CargarDesdeCSV(){
        $usuarios = [];

        $archivo = fopen("usuarios.csv", "r");

        if ($archivo) {
            while (($datos = fgetcsv($archivo, 1000, ",")) !== FALSE) {
                $usuario = new Usuario($datos[0], $datos[1], $datos[2]);
                $usuarios[] = $usuario;
            }
            fclose($archivo);
        } else {
            echo "Error al abrir el archivo de usuarios.csv";
        }

        return $usuarios;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["clave"]) && isset($_POST["mail"])) {

    $clave = $_POST["clave"];
    $mail = $_POST["mail"];

    $listaUsuarios = Usuario::CargarDesdeCSV();

    $usuarioEncontrado = false;
    $mensaje = "Usuario no registrado";

    foreach ($listaUsuarios as $usuario) {
        if ($usuario->getMail() === $mail) {
            $usuarioEncontrado = true;
            $mensaje = $usuario->verificarUsuario($clave, $mail);
            break;
        }
    }

    echo $mensaje;
}
?>
