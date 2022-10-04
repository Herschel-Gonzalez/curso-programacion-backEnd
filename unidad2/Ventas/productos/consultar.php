<?php
    $codigo = $_GET['codigo'];

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
      Stock Minimo
      </td>
      <td>
      Stock Maximo
      </td>
      <td>
      Costo
      </td>
      <td>
      Precio de venta
      </td>
      </tr>';

    $archivo = file("productos.txt");
    $i=0;
    $codigo_modificacion = ""; 
    echo '<form action="/unidad2/ventas/productos/modificar.php" method="post">';
     while (count($archivo)>$i) {
        $registro =  $archivo[$i];
        $producto = explode("@@",$registro);
        if ($producto[1]==$codigo) {
            $codigo_modificacion = $producto[1];
            echo "<tr>";
            echo "<td>";
            echo '<input name="code" id="code" type="text" value="'.$producto[1].'">';
            echo "</td>";
            echo "<td>";
            echo '<input name="nombre" id="nombre" type="text" value="'.$producto[2].'">';
            echo "</td>";
            echo "<td>";
            echo '<input name="marca" id="marca" type="text" value="'.$producto[3].'">';
            echo "</td>";
            echo "<td>";
            echo '<input name="existencias" id="existencias" type="number" value="'.$producto[4].'">';
            echo "</td>";
            echo "<td>";
            echo '<input name="stockMinimo" id="stockMinimo" type="number" value="'.$producto[5].'">';
            echo "</td>";
            echo "<td>";
            echo '<input name="stockMaximo" id="stockMaximo" type="number" value="'.$producto[6].'">';
            echo "</td>";
            echo "<td>";
            echo '<input name="costo" id="costo" type="number" value="'.$producto[7].'">';
            echo "</td>";
            echo "<td>";
            echo '<input name="precioVenta" id="precioVenta" type="number" value="'.$producto[8].'">';
            echo "</td>";
            echo "</tr>";
            
        }
        $i++;
     }

     echo "</table>";
     echo "<br>";
     echo '<button type="submit">Guardar</button>';
     echo '</form>';



     echo '<style>
table{
            border: 1px;
            border-color: black;
            border-style: solid;
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