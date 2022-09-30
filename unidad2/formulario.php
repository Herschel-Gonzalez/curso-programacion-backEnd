<?php

    $control = $_POST['noControl'];
    $nombre = $_POST['nombre'];

    //fecha y hora
   // $fecha =  date('d/m/y');

    $Object = new DateTime();  
    $Object->setTimezone(new DateTimeZone('America/Mexico_City'));
    $DateAndTime = $Object->format("d-m-Y h:i:s a");
    

    $fh = fopen("formulario.txt",'r+') or die ("Error al crear el archivo");
    $text = '
    '.$DateAndTime.' '.$control.'@@'.$nombre;
    fseek($fh,0,SEEK_END);
    fwrite($fh,"$text") or die("No se puede escribir en el archivo");
    fclose($fh);
    echo "Registro añadido correctamente = ".$text;



 ?>