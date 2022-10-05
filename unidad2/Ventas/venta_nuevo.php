<?php
    include_once "header.php";
    include_once "funciones.php";
    $mensaje = "";
    $renglon = "";
    $cont  = 0;
    $input = "";
    $productos = array();


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



    if (isset($_POST['boton']) && $_POST['boton']=='Buscar') {
        //buscar el codigo en archivo de productos
        
        if ($_POST['codigo']!="") {
           $producto =  buscar_producto($_POST['codigo']);
           // var_dump($producto);
           if ($producto!="") {
            #crear el renglon de la tabla
            $renglon.= renglon_producto($producto,$cont);
            array_push($productos,$producto);
           // array_push($productos,renglon_producto($producto,$cont));
           // $input.= "<input type='text' id='produ_$cont' name='produ_$cont' value='".$_POST['codigo']."'/ > ";
            $cont++;
           }else{
            $mensaje = "El producto no existe.";
           }

        }else{
            $mensaje = "Ingresa un codigo de barras";
        }
        
    }



//imprimimos la tabla
if ($cont>0) {
    # code...
    $renglon= "";
    var_dump($productos);
for ($i=0; $i < count($productos); $i++) {
    $producto = $productos[$i];
        $renglon.= "<tr><td>No.</td>";
        $renglon.="<td><input type='number' name='produ_$i' id='produ_$i' value='1'></td>";
        
        $renglon.="<td><input type='number' name='producod_$i' readonly id='producod_$producto[1]' value='$producto[1]'></td>";
        $renglon.="<td>$producto[2]</td>";
        $renglon.="<td>$producto[8]</td>";
        $renglon.="</tr>";
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

        <br>
        <table border=1>
			<tr>
				<td>No.</td>
				<td>Cantidad</td>
				<td>Codigo</td>
				<td>Nombre</td>
				<td>Precio</td>
			</tr>
            $renglon
		</table>
        $input

</form>
_FORM;


function agregar_nuevo($producto){
    $existentes = 0;
    for ($i=0; $i < count($productos); $i++) { 
        $prod = $productos[$i];
        if ($prod[1]==$producto[1]) {
            $existentes++;
            $cantidad_existente = $prod[0];
            $cantidad_a_agregar = $producto[0];
            
            $productos[$i]=$prod;
        }
    }

    if ($existentes>0) {
        
    }else{
        array_push($productos,$producto);
    }

}


?>