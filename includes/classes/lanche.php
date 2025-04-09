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

    function cadastroLanche($ing,$qtd){
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
        $ret = $this->salvaIngredientes($resultado['lan_codigo'],$ing,$qtd);
        $con->closeConnection();
        return $ret;
    }
    function salvaIngredientes($lan,$codigos,$qtd){
        $con = new Database();
        $x = 0;
        while ($x <=$qtd){
            $query = "INSERT INTO lanchecompleto (lan_codigo,ing_codigo) VALUES (:codigoLache,:codigoIngrediente)";
            $resultadoIngre = $con->prepare($query);
            $resultadoIngre->bindParam(':codigoLache',$lan,PDO::PARAM_INT);
            $resultadoIngre->bindParam(':codigoIngrediente',$codigos[$x],PDO::PARAM_INT);
            $resultadoIngre->execute();
            $resultadoIngre->closeCursor(); 
            $x++;
        }
        $con->closeConnection();
        return  "sim";
    }
    
}
?>