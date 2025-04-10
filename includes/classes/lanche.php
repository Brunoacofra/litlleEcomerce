<?php
include_once './includes/classes/conexao.php';
class Lanche extends Database{
    public $nome;
    public $ingredientes = array();
    public $preco;
    private $con;
    public function __construct(){
        $this->con = new Database();
    }
    public function getPreco(){
        return $this->preco;
    }
    public function setPreco($p){
        $this->preco = $p;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getIngredientes(){
        return $this->ingredientes;
    }
    public function setIngredientes($a){
        $this->ingredientes = $a;
    }

    public function cadastroLanche($ing,$qtd){
        $query = "INSERT INTO lanches (lan_nome,lan_preco) VALUES(:nome,:preco)";
        $resultado = $this->con->prepare($query);
        $resultado->bindParam(":nome",$this->nome,PDO::PARAM_STR);
        $resultado->bindParam(":preco",$this->preco,PDO::PARAM_STR);
        $resultado->execute();
        $resultado->closeCursor();
        $query = "Select * FROM lanches WHERE lan_nome = :nome AND lan_preco = :preco";
        $resul = $this->con->prepare($query);
        $resul->bindParam(':nome',$this->nome,PDO::PARAM_STR);
        $resul->bindParam(':preco',$this->preco,PDO::PARAM_STR);
        $resul->execute();
        $resultado = $resul->fetch(PDO::FETCH_ASSOC);
        $resul->closeCursor();
        $ret = $this->salvaIngredientes($resultado['lan_codigo'],$ing,$qtd);
        $this->con->closeConnection();
        return $ret;
    }
    protected function salvaIngredientes($lan,$codigos,$qtd){
        $x = 1;
        while ($x <= $qtd){
            $query = "INSERT INTO lanchecompleto (lan_codigo,ing_codigo) VALUES (:codigoLache,:codigoIngrediente)";
            $resultadoIngre = $this->con->prepare($query);
            $resultadoIngre->bindParam(':codigoLache',$lan,PDO::PARAM_INT);
            $resultadoIngre->bindParam(':codigoIngrediente',$codigos[$x],PDO::PARAM_INT);
            $resultadoIngre->execute();
            $resultadoIngre->closeCursor(); 
            $x++;
        }
        $this->con->closeConnection();
        return  "Gravado com sucesso";
    }
    
}
?>