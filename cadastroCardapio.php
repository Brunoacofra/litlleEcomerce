<?php
    include_once './includes/classes/lanche.php';
    if(isset($_POST['enviar'])){
        $qtd = count($_POST)-3 ;
        //print('<script>alert("quantidade: '.$qtd.'")</script>');
        $lanche = new Lanche();
        $lanche->setNome($_POST['nome']);
        $lanche->setPreco($_POST['preco']);
        $ingredientes = array();
        for($i = 1;$i<=$qtd;$i++){
            $ingredientes[$i] = $_POST['select_'.$i];
        }
        //var_dump($ingredientes);
        print($lanche->cadastroLanche($ingredientes,$qtd));
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
                            <label>Preço:</label>
                        </div>
                        <div>
                            <input type="Number" name="preco">
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