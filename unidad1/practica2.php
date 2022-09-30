<?php
    echo "<center><h1> Practica 2</h1></center>";
    echo 'Tabla';
 
    echo "<br>"; // Salto de linea


$tabla = '<table border=1>';
$contador = 1;   
for ($i=0; $i < 10; $i++) { 
    #
    $tabla .= "<tr>"; 
    for ($j=0; $j < 10; $j++) { 
        # code...
        if ($contador%2==0) {
            # code...
            $tabla .= "<td>".$contador."</td>";
            $contador++;
        }else{
            $tabla .= "<td bgcolor='red'>".$contador."</td>";
            $contador++;
        }
        
        
    }
    $tabla .= "</tr>";
    
}
$tabla .= "</table>";
echo $tabla;



#imprimir en consola con JS
#echo "<script>console.log('Console: " . $tabla . "' );</script>";
?>




