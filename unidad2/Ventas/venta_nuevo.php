<?php
    include_once "header.php";
    include_once "funciones.php";
    $mensaje = "";
    $renglon = "";
    $cont  = 0;
    $input = "";
    $ventas = array();
    $tabla = "";
    $numero_productos = 0;
    $aviso = "";


    if (isset($_POST['contador'])) {
        $cont = $_POST['contador'];
        if ($_POST['contador']>0) {
            $numero_productos = $_POST['cont_productos'];
             $i =0;
            while ($i<$cont) {
                $renglon.="<tr>";
                $renglon.="<td>".$i."</td>";
                $renglon.="<td><input type='number' name='cant_$i' id='cant_$i' value='".$_POST['cant_'.$i]."'></td>";
                $renglon.="<td><input type='number' name='cod_$i' readonly id='cod_$i' value='".$_POST['cod_'.$i]."'></td>";
                $renglon.="<td><input type='text' name='nom_$i' readonly id='nom_$i' value='".$_POST['nom_'.$i]."'></td>";
                $renglon.="<td><input type='number' name='prec_$i' readonly id='prec_$i' value='".$_POST['prec_'.$i]."'></td>";
                $renglon.="</tr>";
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
            $existe = false;
            if ($_POST['contador']>0) {
                $contador = $_POST['contador'];
                for ($i=0; $i < $contador; $i++) { 
                    if ($_POST['codigo']==$_POST['cod_'.$i]) {
                        $nueva_cantidad = $_POST['cant_'.$i];
                        $nueva_cantidad++;
                        $nueva_linea = str_replace("<input type='number' name='cant_$i' id='cant_$i' value='".$_POST['cant_'.$i]."'>","<input type='number' name='cant_$i' id='cant_$i' value='".$nueva_cantidad."'>", $renglon);
                        $renglon = $nueva_linea;
                        $existe = true;
                        $numero_productos++;
                    }
                }
                
            }
            if ($existe==false) {
                $renglon.= renglon_producto($producto,$cont);
                $cont++;
                $numero_productos++;
            }
            
           // array_push($productos,renglon_producto($producto,$cont));
           // $input.= "<input type='text' id='produ_$cont' name='produ_$cont' value='".$_POST['codigo']."'/ > ";
           }else{
            $mensaje = "El producto no existe.";
           }

        }else{
            $mensaje = "Ingresa un codigo de barras";
        }
        
    }

    //REGISTRAR VENTA

    if (isset($_POST['boton']) && $_POST['boton']=='Registrar venta') {
        if ($_POST['contador']>0) {
            if (file_exists("ventas.txt")) {
                $fh = fopen("ventas.txt",'r+') or die ("Error al crear el archivo");
                
                //DESCONTAR EXISTENCIAS
                $contador = $_POST['contador'];
                $archivo_productos = file("productos/productos.txt");

               



                //sacamos los registros
                for ($i=0; $i < $contador; $i++) { 
                    $cantidad = intval($_POST['cant_'.$i]);
                    $codigo = intval($_POST['cod_'.$i]);
                    $nombre = strval($_POST['nom_'.$i]);
                    $precio = intval($_POST['prec_'.$i]);
                    $venta = $cantidad.'@@'.$codigo.'@@'.$nombre.'@@'.$precio.'@@'.$venta."\n";
    
                    fseek($fh,0,SEEK_END);
                    fwrite($fh,"$venta") or die("No se puede escribir en el archivo");



                    //DESCONTAR EXISTENCIAS
                    $j=0;
                    while (count($archivo_productos)>$j) {
                        $registro =  $archivo_productos[$j];
                        $producto = explode("@@",$registro);
                        if ($producto[1]==$codigo) {
                            $linea = $archivo_productos[$j];
                            $producto = explode("@@",$linea);
                            $contents = file_get_contents("productos/productos.txt");
                            $cantidad_existente = $producto[4];
                            $producto[4]=$cantidad_existente-$cantidad;
                            $nuevo_producto = implode("@@", $producto);
                            $contents = str_replace($linea, $nuevo_producto, $contents);
                            file_put_contents("productos/productos.txt", $contents);
                
                        }
                        $j++;
                    }


                    
                    $aviso = "Se registro correctamente la venta";
    
                }
                fclose($fh);
                
            }else{
                $mensaje = "El archivo no existe";
            }
        }else{
            $aviso = "No tienes ninguna venta en proceso";
        }
       
    }



echo <<<_FORM
<h2>Registrar Venta</h2>
<form action="venta_nuevo.php" method="POST">
        <input type='text' id='contador' name='contador' value='$cont'/>
        <label>$mensaje</label><br><br>
		<label>Productos agregados:</label><input type='number' readonly id='cont_productos' name='cont_productos' value='$numero_productos'><br><br>
        <label>Código de barras</label>
		<input type="text" name="codigo" id="codigo"/>
		<input type="submit" id="buscar" name="boton" value="Buscar">

        <br>
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

        <br>

        <input type="submit" id="buscar" name="boton" value="Registrar venta">
        $aviso

</form>
_FORM;

?>