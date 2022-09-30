<?php
  //  echo $_POST['caja'];
    if (isset($_POST['caja'])&& $_POST['caja']!="") {
        # code...
       // echo $_POST['caja'];
       /*
        */

    }else {
        echo "Por favor ingresa un valor";
    }

    $cadena = $_POST['caja'];

    contarVocales($cadena);

    function contarVocales($cadena){
        $contador = 0;
        $cadenaMinuscula = strtolower($cadena);
        for ($i=0; $i < strlen($cadenaMinuscula); $i++) { 
            if ($cadenaMinuscula[$i]=="a"|| $cadenaMinuscula[$i]=="e" || $cadenaMinuscula[$i]=="i" || $cadenaMinuscula[$i]=="o" || $cadenaMinuscula[$i]=="u" ) {
                # code...
                $contador++;
            }
        }
        echo " Hay ".$contador." vocales en la cadena";
    }

?>