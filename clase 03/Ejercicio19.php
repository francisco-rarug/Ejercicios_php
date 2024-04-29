<?php
    class Auto{
        private $_color;
        private $_precio;
        private $_marca;
        private $_fecha;
    
        public function __construct($color, $marca, $precio = 0, $fecha = 0){
            $this->_color = $color;
            $this->_precio = $precio;
            $this->_marca = $marca;
            $this->_fecha = $fecha;
        }
    
        public function AgregarImpuestos($aumentoPrecio){
            $this->_precio += $aumentoPrecio;
        }
    
        public function mostrarAuto() {
            echo "Color: " . $this->_color . "<br>";
            echo "Precio: " . $this->_precio . "<br>";
            echo "Marca: " . $this->_marca . "<br>";
            echo "Fecha: " . $this->_fecha . "<br>";
        }
    
        public function Equals(Auto $otroAuto) {
            return $this->_marca === $otroAuto->_marca;
        }
    
        public static function Add(Auto $auto1, Auto $auto2) {
            if ($auto1->Equals($auto2)) {
                return $auto1->_precio + $auto2->_precio;
            } else {
                echo "Los autos tienen diferentes marcas y precios";
                return 0;
            }
        }

        public static function getPropiedades(Auto $autos){

            return $propiedades = array($autos->_color,$autos->_marca,$autos->_precio,$autos->_fecha);
    }

        public function guardarAutoEnCSV($nombreArchivo){
            $datos = array($this->_color, $this->_marca, $this->_precio, $this->_fecha);
            $csv = fopen($nombreArchivo, 'a');
            fputcsv($csv, $datos);
            fclose($csv);
        }
    
        public function leerAutosDesdeCSV($nombreArchivo){
            $autos = array();
            if (($archivo = fopen($nombreArchivo, "r"))) {
                while (($data = fgetcsv($archivo, 1000, ","))) {
                    $color = $data[0];
                    $marca = $data[1];
                    $precio = $data[2];
                    $fecha = $data[3];
                    $auto = new Auto($color, $marca, $precio, $fecha);
                    $autos[] = $auto;
                }
                fclose($archivo);
            }
            return $autos;
        }
    }
    
    
    
?>