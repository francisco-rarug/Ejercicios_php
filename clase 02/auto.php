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
    }
    
    
    
?>