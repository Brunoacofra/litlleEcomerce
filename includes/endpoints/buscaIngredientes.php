<?php
    header('Content-Type: application/json');
    include_once __DIR__ .'/../classes/ingredientes.php';
    $con = new ingrediente();
    $resultado = $con->buscaIngre();
    echo(json_encode($resultado));
    ?>