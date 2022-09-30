<?php
    $array = array('juan','carlos','luis','maria',6,8);
    $assoc = array("nombre"=>"Caroll","apellido_paterno"=>"Peñaloza","apellido_materno"
    =>"Tello","telefono"=>"7151531234");
   // var_dump($array);

    mostrar_array($assoc);
    ciclo_while($array);
    ciclo_do_while($array);

    function mostrar_array($a){
        echo "<pre>";
        var_dump($a);
        echo "</pre>";
    }

    

    function ciclo_while($a){
        $i=0;
        while (count($a)>$i) {
            echo $a[$i]."<br>";
            $i++;
        }

    }

    function ciclo_do_while($a){
        $i=0;
        do {
            echo "<br>Elemento de la posicion ".$i.": ".$a[$i];
            $i++;
        } while (count($a)>$i);
    }
    

?>