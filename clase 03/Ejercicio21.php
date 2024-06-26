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


$listaUsuarios = Usuario::CargarDesdeCSV();

echo "Lista de Usuarios:";

foreach ($listaUsuarios as $usuario) {
    echo "{$usuario->getNombre()} - {$usuario->getClave()} - {$usuario->getMail()}";
}
?>
