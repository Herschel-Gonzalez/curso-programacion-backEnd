<?php
//retornara un select con las marcas, que leera desde un archivo
    $productos = [];
    function cargarMarcas(){
        $fh = fopen("marcas.txt",'r') or die ("Error al crear el archivo");
        $opt = "";
        while ($l = fgets($fh)) {
           // $opt.="<option value='".trim($l)."'>$l</option>";
            $opt.='<option value="'.trim($l).'">'.$l.'</option>';
        }
        fclose($fh);

        return $opt;

    }

    function seleccionar_marca($marca){
        $fh = fopen("marcas.txt",'r') or die ("Error al crear el archivo");
        $opt = "";
        $s = "";
        while ($l = fgets($fh)) {
           if ($marca==trim($l)) {
            $s="selected";

           }else{
            $s="";
           }
           $opt.="<option value='".trim($l)."'$s>$l</option>";
        }
        fclose($fh);
        return $opt;

    }

    //busca un producto por codigo de barras
    function buscar_producto($codigo){
        $fl = file('productos/productos.txt');
        $i = 0;
        $producto = "";
        while(count($fl)>$i){
            $line = $fl[$i];
            $vec = explode("@@",$line);
            if ($codigo==$vec[1]) {
                $producto=$vec;
            }
            $i++;
        }
        return $producto;
    }

    function renglon_producto($producto,$contador){
        agregar_producto_a_venta($producto);
        echo var_dump($productos);
        return 
    "<tr>
        <td>No.</td>
        <td><input type='number' name='produ_$contador' id='produ_$contador'></td>
        <td>$producto[1]</td>
        <td>$producto[2]</td>
        <td>$producto[8]</td>
    </tr>";
    }

    function agregar_producto_a_venta($producto){
        array_push($productos,$producto);
    }



    

?>