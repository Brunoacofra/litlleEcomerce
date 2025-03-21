<?php
    //include_once './includes/classes/lanche.php';
    if(isset($_POST['enviar'])){
        $qtd = count($_POST);
        print('<script>alert("quantidade: '.$qtd.'")</script>');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cadastro de Lanches</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="./includes/styles/estilocadastro.css">
    </head>
    <body>
        <div id="container">
            <div class="body">
                <div class="form">
                    <h2>Cadastro de Lanche</h2>
                    <form method="POST">
                        <div>
                            <label>Nome Lanche:</label>
                        </div>
                        <div>
                            <input type="text" name="nome">
                        </div>
                        <div>
                            <label>Ingredientes:</label>
                        </div>
                        <button onclick="adicionar()" type="button">+</button>
                        <button onclick="remover()"type="button">-</button>
                        <div id="campos">
                        </div>
                        <div>
                            <button name="enviar" type="submit">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script src="./includes/funcoes/function.js"></script>
</html>