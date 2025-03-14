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
        $query = "INSERT INTO ingrediente (ing_nome) VALUES(:nome)";
        $consulta = $conexao->prepare($query);
        $consulta->bindParam(':nome',$this->ingrediente, PDO::PARAM_STR);
        $consulta->execute();
        $consulta->closeCursor(); 
        $conexao->closeConnection();
        return $this->getIngrediente();
    }
}
?>