<?php

echo <<<_head
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
    </head>
    <body>
            <ul>
            <li>Productos
                <ul>
                    <li><a href="/unidad2/ventas/productos/nuevo.php">Nuevo</a></li>
                    <li><a href="/unidad2/ventas/productos/listado.php">Listado</a></li>
                </ul>
            </li>

            <li>Ventas
            <ul>
                <li><a href="/unidad2/ventas/venta_nuevo.php">Nuevo</a></li>
                <li><a href="/unidad2/ventas/venta_listado.php">Listado</a></li>
            </ul>
            </li>
            </ul>
        
    </body>

    </html>
    _head;

?>