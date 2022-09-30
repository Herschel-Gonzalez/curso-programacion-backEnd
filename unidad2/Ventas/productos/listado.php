<?php

    require_once "../header.php";

    echo "<h1>Listado de productos</h1>";

    echo <<<_end
    </body>
    </html>
    _end;

    echo '<table>
      <tr>
      <td>
      Código
      </td>
      <td>
      Nombre
      </td>
      <td>
      Marca
      </td>
      <td>
      Existencias
      </td>
      <td>
      Costo
      </td>
      <td>
      Precio Venta
      </td>
      <td>
      Acciones
      </td>
      </tr>';

//llenamos la tabla

if (file_exists("productos.txt")) {
    $f = file('productos.txt');
    $i = 0;
    while (count($f)>$i) {
        $registro =  $f[$i];
        $producto = explode("@@",$registro);
        echo "<tr>";
        echo "<td>";
        echo $producto[1];
        echo "</td>";
        echo "<td>";
        echo $producto[2];
        echo "</td>";
        echo "<td>";
        echo $producto[3];
        echo "</td>";
        if ($producto[4]<$producto[5]) {
            echo '<td bgcolor="red">';
            echo $producto[4];
            echo "</td>";
        }else{
            echo '<td bgcolor="blue">';
            echo $producto[4];
            echo "</td>";
        }
        
        echo "<td>";
        echo $producto[7];
        echo "</td>";
        echo "<td>";
        echo $producto[8];
        echo "</td>";
        //<td bgcolor="red">
        
            //consultar, eliminar, modificar
            echo "<td>";
            echo '<a href="http://localhost/unidad2/ventas/productos/consultar.php?codigo='.$producto[1].'"><button type="button">Consultar</button></a>';
            echo '<br>';
            echo '<br>';
            echo '<a href="http://localhost/unidad2/ventas/productos/eliminar.php?codigo='.$producto[1].'"><button type="button">Eliminar</button></a>';
            echo "</td>";
            echo "</tr>";

       

        $i++;
    }
    
 
    echo "</table>";
}else{
    echo "El archivo no existe";
}

echo '<style>
table{
            border: 1px;
            border-color: black;
            border-style: solid;
            width: 600px;
            height: 400px;
            margin:auto;
            text-align: center;

}
th,td{
    border: 1px;
    border-color: black;
    border-style: solid;

}
</style>
';

?>