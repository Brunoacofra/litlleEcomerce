<?php
include_once './includes/classes/conexao.php';
class ingrediente extends Database{
    public $ingrediente;
    function getIngrediente(){
        return $this->ingrediente;
    }

    function setIngrediente($ing) {
        $this->ingrediente = $ing;  
    }

    function cadastrar(){
        $conexao = new Database();
        $query = "INSERT INTO ingredientes (ing_nome) VALUES(:nome)";
        $consulta = $conexao->prepare($query);
        $consulta->bindParam(':nome',$this->ingrediente, PDO::PARAM_STR);
        $consulta->execute();
        $consulta->closeCursor(); 
        $conexao->closeConnection();
        return $this->getIngrediente();
    }
    function buscaIngre(){
        $conexao = new Database();
        $query = "SELECT * FROM ingredientes";
        $resul = $conexao->prepare($query);
        $resul->execute();
        $resultado = $resul->fetchAll(PDO::FETCH_ASSOC); //Pega varios resultados e devolve um array
        $conexao->closeConnection();
        return json_encode($resultado);
    }
}
?>