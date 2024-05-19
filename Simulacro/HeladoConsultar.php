<?php
class HeladoConsultar {
    public static function comprobacion(){
        if (file_exists("Heladeria.json")){
            $encontrado = false;
            $heladeria = json_decode(file_get_contents("Heladeria.json"), true);
            foreach ($heladeria as &$helado){
                if ($helado["sabor"] == $_POST["sabor"] or $helado["tipo"] == $_POST["tipo"]){
                    $encontrado =true;
                    return "existe";
                }
            }
            if ($encontrado == false){
                return "no existe";
            }
        }else{
            return "no existe el archivo";
        }
}

}
?>