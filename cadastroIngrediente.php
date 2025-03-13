<?php
    include_once './includes/classes/ingredientes.php';
    include_once './includes/classes/conexao.php'
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro de Ingredietes</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="./includes/styles/estilocadastro.css">
    </head>
    <body>
        <div id="container">
            <div class="body">
                <div class="form">
                    <h2>Cadastro de Ingredientes</h2>
                    <form action="">
                        <div>
                            <label>Ingrediente:</label>
                        </div>
                        <div>
                            <input type="text" name="ing">
                        </div>
                        <div>
                            <button type="submit">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>