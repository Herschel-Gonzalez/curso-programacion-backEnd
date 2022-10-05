<?php
    include_once "header.php";
    include_once "funciones.php";
    $mensaje = "";
    $renglon = "";
    $cont  = 0;
    $input = "";
    $ventas = array();
    $tabla = "";

/*
    if (isset($_POST['contador'])) {
        $cont = $_POST['contador'];
        if ($_POST['contador']>0) {
             $i =0;
            while ($i<$cont) {
                $producto =  buscar_producto($_POST['producod_'.$i]);
                if ($producto!="") {
                    array_push($productos,$producto);
                    $renglon.= renglon_producto($producto,$cont);
                }
                
              //  $input.= "<input type='text' id='produ_$cont' name='produ_$cont' value='".$_POST['produ_'.$i]."'/ > ";
                $i++;
               // $cont++;

            }
        }
    }

*/

    if (isset($_POST['boton']) && $_POST['boton']=='Buscar') {
        //buscar el codigo en archivo de productos
        
        if ($_POST['codigo']!="") {
           $producto =  buscar_producto($_POST['codigo']);
           // var_dump($producto);
           if ($producto!="") {
            #crear el renglon de la tabla
            $venta = array();
            $venta[0]=1;
            $venta[1]=$producto[1];
            $venta[2]=$producto[2];
            $venta[3]=$producto[8];
            array_push($ventas,$venta);
            crear_tabla_ventas($ventas);
            $cont++;
           // array_push($productos,renglon_producto($producto,$cont));
           // $input.= "<input type='text' id='produ_$cont' name='produ_$cont' value='".$_POST['codigo']."'/ > ";
           }else{
            $mensaje = "El producto no existe.";
           }

        }else{
            $mensaje = "Ingresa un codigo de barras";
        }
        
    }



echo <<<_FORM
<h2>Registrar Venta</h2>
<form action="venta_nuevo.php" method="POST">
        <input type='text' id='contador' name='contador' value='$cont'/>
        <label>$mensaje</label><br>
		<label>Código de barras</label>
		<input type="text" name="codigo" id="codigo"/>
		<input type="submit" id="boton" name="boton" value="Buscar">

</form>
_FORM;


function crear_tabla_ventas($ventas){
    $tabla = '<table border=1>
            <tr>
				<td>No.</td>
				<td>Cantidad</td>
				<td>Codigo</td>
				<td>Nombre</td>
				<td>Precio</td>
			</tr>';
    for ($i=0; $i < count($ventas); $i++) { 
        $venta = $ventas[$i];
        $tabla.='<tr>';
        $tabla.='<td>';
        $tabla.=$i+1;
        $tabla.='</td>';
        $tabla.='<td>';
        $tabla.=$venta[0];
        $tabla.='</td>';
        $tabla.='<td>';
        $tabla.=$venta[1];
        $tabla.='</td>';
        $tabla.='<td>';
        $tabla.=$venta[2];
        $tabla.='</td>';
        $tabla.='<td>';
        $tabla.=$venta[3];
        $tabla.='</td>';
        $tabla.='</tr>';
    }
    $tabla.='</table>';
    echo $tabla;
}
    



function agregar_nuevo($producto){
    $existentes = 0;
    for ($i=0; $i < count($productos); $i++) { 
        $prod = $productos[$i];
        if ($prod[1]==$producto[1]) {
            $existentes++;
            $cantidad_existente = $prod[0];
            $cantidad_a_agregar = $producto[0];
            $nueva_cantidad = $cantidad_existente+$cantidad_a_agregar;

            $prod[0]=$nueva_cantidad;
            $productos[$i]=$prod;
        }
    }

    if ($existentes>0) {
        
    }else{
        array_push($productos,$producto);
    }

}


?>