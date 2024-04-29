<?php

    include_once("Ejercicio19.php");
    class Garaje{
        private $_razonSocial;
        private $_precioPorHora;
        private array $_autos = [];
    
        public function __construct($razonSocial, $precioPorHora, $autos = []){
            $this->_razonSocial = $razonSocial;
            $this->_precioPorHora = $precioPorHora;
            $this->_autos = $autos;
        }
    
        public function MostrarGaraje(){
            echo "Razon social " . $this->_razonSocial . "<br>";
            echo "Precio por hora " . $this->_precioPorHora . "<br>";
            if (!empty($this->_autos)) {
                foreach($this->_autos as $auto){
                    $auto->mostrarAuto();
                    echo "---------------------------------------------- <br>";
                }
            } else {
                echo "No hay autos en el garaje <br>";
            }
        }
    
        public function Equals(Auto $auto){
            return in_array($auto, $this->_autos, true);
        }
    
        public function Add(Auto $auto){
            if($this->Equals($auto)){
                echo "El auto ya está en el garaje <br>";
            } else {
                $this->_autos[] = $auto;
                echo "Auto agregado al garaje <br>";
            }
        }
    
        public function Remove(Auto $auto){
            $key = array_search($auto, $this->_autos, true);
            if($key !== false){
                unset($this->_autos[$key]);
                echo "Auto eliminado del garaje <br>";
            } else {
                echo "El auto no está en el garaje <br>";
            }
        }

        public function guardarGarajeEnCSV($nombreArchivo){
            $archivo = fopen($nombreArchivo, "a");
            if ($archivo){
                foreach ($this->_autos as $auto){
                    $propiedades = $auto->getPropiedades($auto);
                    fputcsv($archivo, $propiedades);
                }
                fclose($archivo);
                echo "Garaje guardado en CSV correctamente <br>";
            } else {
                echo "Error al abrir el archivo para escritura <br>";
            }
        }
        
    
        public function leerGarageCsv($nombreArchivo){

            $archivo = fopen($nombreArchivo, "r");
            while(!feof($archivo)){
                echo fgets($archivo). "<br>";
            }
            fclose($archivo);
        }
    }
    

?>