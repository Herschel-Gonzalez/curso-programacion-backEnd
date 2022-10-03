<?php
    include_once "header.php";
    include_once "funciones.php";
    $mensaje = "";
    $renglon = "";
    $cont  = 0;
    $input = "";

/*
    if (isset($_POST['contador'])) {
        $cont = $_POST['contador'];
        if ($_POST['contador']>0) {
            
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
            $renglon.= renglon_producto($producto,$cont);
           // array_push($productos,renglon_producto($producto,$cont));
            $input.= "<input type='text' id='produ_$cont' name='produ_$cont' value='".$_POST['codigo']."'/ > ";
            $cont++;
           }else{
            $mensaje = "El producto no existe.";
           }

        }else{
            $mensaje = "Ingresa un codigo de barras";
        }
        
    }

    echo get_productos_a_vender();

    
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

?>