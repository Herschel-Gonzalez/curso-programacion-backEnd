<?php
    echo '<form action="examen.php" method="post">

    <label for="caja">Numero </label>
    <input type="number" name="caja" id="caja">
    <button type="submit">Enviar</button>

</form>';

    $numero = intval($_POST['caja']);

    for ($i=$numero; $i >= 1; $i--) { 
        # code...
        echo "<label for='caja'>".$numero.'X'.$i.' = '."</label>";
        echo '<input type="number" name="caja" id="caja" value="'.($numero*$i).'"><br>';
    }

?>
