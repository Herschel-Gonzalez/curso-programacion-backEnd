<?php

    $Object = new DateTime();  
    $Object->setTimezone(new DateTimeZone('America/Mexico_City'));
    $DateAndTime = $Object->format("d-m-Y h:i:s a");

    $archivo = file("productos.txt");


    $fecha = $DateAndTime;
    $codigo_limpio = $_POST['code'];
    $codigo = "@@".intval($_POST['code']);
    $nombre = "@@".strval($_POST['nombre']);
    $marca = "@@".strval($_POST['marca']);
    $existencias = "@@".intval($_POST['existencias']);
    $stock_minimo = "@@".intval($_POST['stockMinimo']);
    $stock_maximo = "@@".intval($_POST['stockMinimo']);
    $costo = "@@".intval($_POST['costo']);
    $precio_venta = "@@".intval($_POST['precioVenta']);


    $nuevo_producto=$fecha.$codigo.$nombre.$marca.$existencias.$stock_minimo.$stock_maximo.$costo.$precio_venta;

    $i=0;
    while (count($archivo)>$i) {
        $registro =  $archivo[$i];
        $producto = explode("@@",$registro);
        if ($producto[1]==$codigo_limpio) {
            $linea = $archivo[$i];
            $producto = explode("@@",$linea);
            $contents = file_get_contents("productos.txt");
            $contents = str_replace($linea, $nuevo_producto, $contents);
            file_put_contents("productos.txt", $contents);
            echo "Se modificó con exito el producto ".$producto[2];
   
        }
        $i++;
    }
    





?>