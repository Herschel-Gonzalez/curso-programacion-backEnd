<?php

require_once "funciones.php";

$options = cargarMarcas();
//echo $options;

if (file_exists("marcas.txt")) {
    $fh = fopen("marcas.txt",'r') or die ("Error al crear el archivo");
    $lista = fgets($fh);
    fclose($fh);
    echo '<form action="registro.php" method="post">';
    echo '<label for="codBarras">Codigo de barras</label>
    <input type="number" name="codBarras" id="codBarras">
    <br>
    <br>
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre">
    <br>
    <br>
    <label for="Marca">Marca</label>
    ';

    $marcas = explode("@@",$lista);
    $marcas_externas = explode("@@",$options);

    echo '<select name="marcas" id="marcas" >';
    for ($i=0; $i < count($marcas_externas); $i++) { 
        echo '<option value="'.$marcas[$i].'">'.$marcas[$i].'</option>';
    }
    echo '</select>';

    echo '
    <br>
    <br>
    <label for="existencias">Existencias</label>
    <input type="number" name="existencias" id="existencias">
    <br>
    <br>
    <label for="stock_minimo">Stock Minimo</label>
    <input type="number" name="stock_minimo" id="stock_minimo">
    <br>
    <br>
    <label for="stock_maximo">Stock Maximo</label>
    <input type="number" name="stock_maximo" id="stock_maximo">
    <br>
    <br>
    <label for="costo">Costo</label>
    <input type="number" name="costo" id="costo">
    <br>
    <br>
    <label for="precio">Precio Venta</label>
    <input type="number" name="precio" id="precio">
    <br>
    <br>
    
    <button type="submit">Guardar</button>
    <button type="reset">Limpiar</button>
    <a href="tabla_productos.php"><button type="button">Cancelar</button></a>
    ';


    echo '</form>';



    



}else{
    echo "El archivo no existe";
}


?>