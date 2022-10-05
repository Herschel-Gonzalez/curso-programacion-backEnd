<?php
//retornara un select con las marcas, que leera desde un archivo
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

    function crear_renglon($contador){
        return 
    "<tr>
        <td>$contador</td>
        <td><input type='number' name='cant_$contador' id='cant_$contador' value='1'></td>
        <td><input type='number' name='cod_$contador' readonly id='cod_$producto[1]' value='$producto[1]'></td>
        <td><input type='text' name='nom_$contador' readonly id='nom_$producto[2]' value='$producto[2]'></td>
        <td><input type='number' name='prec_$contador' readonly id='prec_$producto[8]' value='$producto[8]'></td>
    </tr>";
    }

    function renglon_producto($producto,$contador){

        


        return 
    "<tr>
        <td>$contador</td>
        <td><input type='number' name='cant_$contador' id='cant_$contador' value='1'></td>
        <td><input type='number' name='cod_$contador' readonly id='cod_$contador' value='$producto[1]'></td>
        <td><input type='text' name='nom_$contador' readonly id='nom_$contador' value='$producto[2]'></td>
        <td><input type='number' name='prec_$contador' readonly id='prec_$contador' value='$producto[8]'></td>
    </tr>";
    }




    

?>