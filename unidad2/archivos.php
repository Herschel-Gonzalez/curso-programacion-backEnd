<?php
    if (file_exists("archivo.txt")) {
        echo "El archivo existe";
    }else{
        echo "El archivo no existe";
    }

    $fh = fopen("archivo.txt",'w') or die ("Error al crear el archivo");
    $text = "Line 1
    Line 2
    Line 3 ";
    fwrite($fh,$text) or die("No se puede escribir en el archivo");
    fclose($fh);
    echo "<br>";
    echo "Archivo 'testfile.txt' escrito correctamente";

    //nuevo

    $fh = fopen("archivo.txt",'r') or die("El archivo no existe o no tiene permiso de lectura");
    $line = fgets($fh,4);
    fclose($fh);
    echo "<br>";
    echo $line;

    //copiar archivos
    if (!copy('archivo.txt','archivo2.txt')) {
        echo "No se puede copiar el archivo";

    }else{
        echo "<br>Archivo copiado correctamente a 'archivo2.txt'";
    }
    
    //mover archivos
    if (!rename('archivo2.txt','archivo2.txt')) {
        echo "No se puede renombrar el archivo";
    }else{
        echo "<br>Archivo correctamente renombrado en 'archivo2.txt'";
    }

    //eliminar archivo
    if (!unlink('archivo2.txt')) {
        echo "No se puede eliminar el archivo";
    }else{
        echo "<br>Archivo 'archivo2.txt' eliminado de forma correcta";
    }

    //actualizacion del archivo
    $fh = fopen("archivo.txt",'r+') or die("Error al abrir el archivo");
    $text = fgets($fh);
    fseek($fh,0,SEEK_END);
    fwrite($fh,"$text") or die("No se puede escribir en el archivo");
    fclose($fh);
    echo "<br>Archivo 'archivo.txt' actualizado exitosamente";

    // nombre, numero de control, cuando se presione el boton guardarlo en un archivo

?>