<?php
class Usuario{
    private $nombre;
    private $clave;

    private $mail;

    public function __construct($nombre, $clave, $mail){
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->mail = $mail;
    }

    public static function AgregarCsv(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST["nombre"]) && isset( $_POST["clave"]) && isset( $_POST["mail"])){
                $nombre = $_POST["nombre"];
                $clave = $_POST["clave"];
                $mail = $_POST["mail"];

                $archivo = fopen("usuario.csv","a");

                $texto = $nombre . "" . $clave ."". $mail ."";

                echo fputs ($archivo, $texto);

                fclose($archivo);
            }else{
                echo "Se espera un tipo POST";
            }

            $usuario1=new Usuario("franncho", 7777, "rarugfrancisco@gmail.com");

            Usuario::AgregarCsv();
        }
    }
}
?>