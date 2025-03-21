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
    function buscaIngre(){
        $conexao = new Database();
        $query = "SELECT * FROM ingrediente WHERE ing_codigo = :codigo";
        $resul = $conexao->prepare($query);
        $codigo = 12;
        $resul->bindParam(':codigo',$codigo,PDO::PARAM_INT);
        $resul->execute();
        $resultado = $resul->fetch(PDO::FETCH_ASSOC); //Pega varios resultados e devolve um array
        if($resultado){
            $nome = $resultado['ing_nome'];
        }
        //$resultado = $resul->fetchColumn();
        $conexao->closeConnection();
        return $nome;
    }
}
?>