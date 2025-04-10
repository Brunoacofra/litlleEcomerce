<?php
    include_once './includes/classes/ingredientes.php';
    $con = new ingrediente();
    $resultado = $con->buscaIngre();
    print json_encode($resultado);