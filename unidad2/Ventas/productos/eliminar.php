<?php
    $codigo = $_GET['codigo'];
    $archivo = file("productos.txt");
/*
    $contents = file_get_contents("productos.txt");
    $contents = str_replace($line, '', $contents);
    file_put_contents($dir, $contents);
*/
    $i=0;
     while (count($archivo)>$i) {
        $registro =  $archivo[$i];
        $producto = explode("@@",$registro);
        if ($producto[1]==$codigo) {
            $linea = $archivo[$i];
            $producto = explode("@@",$linea);
            $contents = file_get_contents("productos.txt");
            $contents = str_replace($linea, '', $contents);
            file_put_contents("productos.txt", $contents);
            echo "Se eliminó con exito el producto ".$producto[2];
        }
        $i++;
     }

?>