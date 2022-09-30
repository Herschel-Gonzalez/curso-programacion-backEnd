<?php
    $cartas = array('as_espadas','as_rombos','as_corazones','as_treboles','espadas_2','espadas_3','espadas_4'
,'espadas_5','espadas_6','espadas_7','espadas_8','espadas_9','espadas_10',
'espadas_j','espadas_q','espadas_k','rombos_2','rombos_3','rombos_4','rombos_5',
'rombos_6','rombos_7','rombos_8','rombos_9','rombos_10','rombos_j',
'rombos_q','rombos_k','trebols_2','trebols_3','trebols_4','trebols_5','trebols_6','trebols_7',
'trebols_8','trebols_9','trebols_10','trebols_j','trebols_q','trebols_k',
'corazones_2','corazones_3','corazones_4','corazones_5','corazones_6','corazones_7','corazones_8',
'corazones_9','corazones_10','corazones_j','corazones_q','corazones_k');


    $numeroManos = intval($_POST['caja']);

    $cartasNumeros = array();
    $cartas_final = array();

    for ($i=0; $i < 10000; $i++) { 
        # code...
        if (count($cartasNumeros)!=$numeroManos*5) {
            $numero = rand(0,51);
            
            if(in_array($numero,$cartasNumeros)==false){
                array_push($cartasNumeros,$numero);
            }
            
        }else{

            break;

        }

    }


    $contador = 0;

    $cartasMostradas = array();

    for ($i=0; $i < count($cartasNumeros); $i++) { 
        # code...
       $carta =  $cartas[$cartasNumeros[$i]];
       echo '<img src="'.$carta.'.png" />';
       array_push($cartasMostradas,$carta);
       $contador++;
       if ($contador==5) {
        # code...
        echo "<br>";
        $contador=0;
       }
     #  $cinco_cartas_final[$i]=$carta;

    }

    $nombres = array();

    for ($i=0; $i < count($cartasMostradas); $i++) { 
        # code...
        $nombre = strval($cartasMostradas[$i]);

        $aux_nombre = "";
        $as = true;
        for ($j=0; $j < strlen($nombre); $j++) {

            if ($nombre[$j]=="_") {
                # code...
                
                if ($nombre[0]=='a') {
                    # code...
                    array_push($nombres,"as");
                    break;
                }else{
                    array_push($nombres,$nombre[$j+1]);
                    break;
                }
            }
        }

    }
    echo "<br>";
    echo "<br>";
    $cartas_mano = 0;
    $mano = array();
    $numero_de_mano = 0;
    for ($i=0; $i < count($nombres); $i++) { 
        if ($cartas_mano==5) {
            $numero_de_mano++;
            
            echo "manoo  ".mostrar_array($mano)."<br>";
            $elementos = array_count_values($mano);
            foreach ($elementos as $item => $value){
               // echo $item.": ".$value." <br>";
                if ($value%2==0) {

                    echo "La mano ".$numero_de_mano." tiene ".strval($value/2)." par de ".$item."<br>";
                    
                }else{
                    if($value>2){
                        $redondeado = $value-1;

                        echo "Tienes ".strval($redondeado/2)." par de ".$item."<br>";

                    }
                }
           }
           
           $mano = array();

           echo "<br>";
           $cartas_mano = 0;
            

        }else{
            array_push($mano,$nombres[$i]);
            $cartas_mano++;
        }
    }




    function mostrar_array($a){
        echo "<pre>";
        var_dump($a);
        echo "</pre>";
    }


    




?>