<?php
include_once './includes/classes/conexao.php';
class Lanche extends Database{
    public $nome;
    public $ingredientes = array();

    function getNome(){
        return $this->nome;
    }
    function setNome($nome){
        $this->nome = $nome;
    }
    function getIngredientes(){
        return $this->ingredientes;
    }
    function setIngredientes($a){
        $this->ingredientes = $a;
    }

    function cadastroLanche(){
        $con = new Database();
        $query = "INSERT INTO lanches (lan_nome) VALUES(:nome)";
        $resultado = $con->prepare($query);
        $resultado->bindParam(":nome",$this->nome,PDO::PARAM_STR);
        $resultado->execute();
        $resultado->closeCursor();
        $query = "Select * FROM lanches WHERE lan_nome = :nome ";
        $resul = $con->prepare($query);
        $resul->bindParam(':nome',$this->nome,PDO::PARAM_STR);
        $resul->execute();
        $resultado = $resul->fetch(PDO::FETCH_ASSOC);
        $resul->closeCursor();
        $con->closeConnection();
        $teste =  $this->salvaIngredientes($resultado['lan_codigo']);
        return $teste;
    }
    function salvaIngredientes($codigo){
        $con = new Database();
        $query = "Select * FROM lanches WHERE lan_codigo = :codigo ";
        $resul = $con->prepare($query);
        $resul->bindParam(':codigo',$codigo,PDO::PARAM_INT);
        $resul->execute();
        $resultado = $resul->fetch(PDO::FETCH_ASSOC);
        $resul->closeCursor();
        $con->closeConnection();
        return $resultado["lan_codigo"];
    }
}
?>