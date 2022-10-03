<?php
    include_once "header.php";
    include_once "funciones.php";
    $mensaje = "";
    $renglon = "";
    $cont  = 0;
    $input = "";
    
echo <<<_FORM
<h2>Registrar Venta</h2>
<form action="venta_nuevo.php" method="POST">
        <input type='text' id='contador' name='contador' value='$cont'/>
        <label>$mensaje</label><br>
		<label>Código de barras</label>
		<input type="text" name="codigo" id="codigo"/>
		<input type="submit" id="buscar" name="boton" value="Buscar">

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