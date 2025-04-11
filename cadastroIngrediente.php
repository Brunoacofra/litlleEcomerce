<?php
    include_once './includes/classes/ingredientes.php';
    if(isset($_POST['enviar']))
    {
        $ing = new Ingrediente();
        $ing->setIngrediente($_POST['ing']);
        $resul = $ing->cadastrar();
        print '<script>alert("Gravado com sucesso o item - '.$resul.'")</script>';
    }
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
        <nav class="menu">
            <ul>
                <li><a href="./cadastroIngrediente.php">Ingredientes</a></li>
                <li><a href="./cadastroCardapio.php">Lanches</a></li>
                <li><a href="./buscaIngredientes.php">æ</a></li>
            </ul>
        </nav>
            <div class="body">
                <div class="form">
                    <h2>Cadastro de Ingredientes</h2>
                    <form method="POST">
                        <div>
                            <label>Ingrediente:</label>
                        </div>
                        <div>
                            <input type="text" name="ing">
                        </div>
                        <div>
                            <button name="enviar" type="submit">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>