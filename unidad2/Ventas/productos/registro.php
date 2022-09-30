<?php
$codigo_barras = intval($_POST['codBarras']);
$nombre = strval($_POST['nombre']);
$marca = strval($_POST['marcas']);
$existencias = intval($_POST['existencias']);
$stock_minimo = intval($_POST['stock_minimo']);
$stock_maximo = intval($_POST['stock_maximo']);
$costo = intval($_POST['costo']);
$precio_venta = intval($_POST['precio']);

$Object = new DateTime();  
$Object->setTimezone(new DateTimeZone('America/Mexico_City'));
$DateAndTime = $Object->format("d-m-Y h:i:s a");

if (file_exists("productos.txt")) {

    $fh = fopen("productos.txt",'r+') or die ("Error al crear el archivo");
    $text = $DateAndTime.'@@'.$codigo_barras.'@@'.$nombre.'@@'.$marca.'@@'.$existencias.'@@'.$stock_minimo.'@@'.
    $stock_maximo.'@@'.$costo.'@@'.$precio_venta.'@@'."\n";
    fseek($fh,0,SEEK_END);
    fwrite($fh,"$text") or die("No se puede escribir en el archivo");
    fclose($fh);
    echo "Se añadió el producto ".$nombre." al registro";

}else{
    echo "El archivo no existe";
}


?>