<?php
    $cartas = array('as_espadas','as_rombos','as_corazones','as_treboles','espadas_2','espadas_3','espadas_4'
,'espadas_5','espadas_6','espadas_7','espadas_8','espadas_9','espadas_10',
'espadas_j','espadas_q','espadas_k','rombos_2','rombos_3','rombos_4','rombos_5',
'rombos_6','rombos_7','rombos_8','rombos_9','rombos_10','rombos_j',
'rombos_q','rombos_k','trebols_2','trebols_3','trebols_4','trebols_5','trebols_6','trebols_7',
'trebols_8','trebols_9','trebols_10','trebols_j','trebols_q','trebols_k',
'corazones_2','corazones_3','corazones_4','corazones_5','corazones_6','corazones_7','corazones_8',
'corazones_9','corazones_10','corazones_j','corazones_q','corazones_k');


    $cinco_cartas = array(1,2,3,4,5);
    $cinco_cartas_final = array('undefined','undefined','undefined','undefined','undefined');

    for ($i=0; $i < 5; $i++) { 
        # code...
        $cinco_cartas[$i] = rand(0,51);

    }

    //colocamos las cartas
    for ($i=0; $i < 5; $i++) { 
        # code...
       $carta =  $cartas[$cinco_cartas[$i]];
       echo '<img src="'.$carta.'.png" />';
       $cinco_cartas_final[$i]=$carta;
       

    }





?>