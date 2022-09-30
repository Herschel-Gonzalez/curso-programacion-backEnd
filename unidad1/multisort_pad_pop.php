<?php
    
    //INVESTIGADO POR HERSCHEL GONZALEZ POSADAS

    //ARRAY MULTISORT

    echo "<h2>array_multisort</h2>";
    echo "<p>array_multisort() puede usarse para ordenar varios arrays al mismo tiempo, o un array multidimensional por una o más dimensiones.</p>";
    echo "Ejemplo:<br>";

    $array = array("A", "B", "C", "D");
    
    //echo "<br>array(A, B, C, D);<br>";

    echo "<br>array_multisort(array,SORT_DESC,SORT_REGULAR);<br>";

    echo "<br>Salida:<br>";

    echo "<br>El método devuelve el array ordenado: ";
    array_multisort($array,SORT_DESC,SORT_REGULAR);
    print_r($array);

    echo "<br><br>Devuelve true en caso de éxito o false en caso de error.<br>";

    //ARRAY PAD
    echo "<h2>array_pad</h2>";
    echo "<p>Devuelve una copia de array rellenada al tamaño especificado por size con el valor value. Si size es positivo, el array se rellena hacia la derecha, si es negativo hacia la izquierda. Si el valor absoluto de size es menor o igual a la longitud de array, no se lleva a cabo el relleno. Es posible añadir como máximo 1048576 elementos de una sola vez.</p>";
    echo "Ejemplo:<br>";

    $array = array("A", "B", "C", "D");
    
    //echo "<br>array(A, B, C, D);<br>";

    echo "<br>array_pad(array,size,value);<br>";

    echo "<br>Salida:<br>";

    echo "<br>El método devuelve el array rellenado si el tamaño de array es menor a size: ";
    $array_salida = array_pad($array,10,":D");
    print_r($array_salida);

    echo "<br><br>Devuelve una copia de array rellenada al espacio especificado por size con el valor value. Si size es positivo el array es relleno hacia la derecha, si es negativo hacia la izquierda. Si el valor absoluto de size es menor o igual que la longitud de array, no se lleva a cabo el relleno.<br>";

    //ARRAY POP
    echo "<h2>array_pop</h2>";
    echo "<p>array_pop() extrae y devuelve el último elemento del array, acortando el array con un elemento menos.</p>";
    echo "Ejemplo:<br>";

    $array = array("A", "B", "C", "D");
    
    //echo "<br>array(A, B, C, D);<br>";

    echo "<br>array_pop(array);<br>";

    echo "<br>Salida:<br>";

    echo "<br>Devuelve el último elemento del array. Si el array está vacío (o no es un array), se devolverá null. ";
    $array_salida = array_pop($array);
    echo "<br>elemento devuelto:<br>";
    print_r($array_salida);
    echo "<br>array original:<br>";
    print_r($array);

?>