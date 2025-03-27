<?php
include_once './includes/classes/conexao.php';
class Lanche extends Database{
    public $nome;
    //public $ingredientes[];

    function getNome(){
        return $this-nome;
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
        return $this->nome;

    }
    private function salvaIngredientes($codigo){

    }
}
?>