<?php
include_once './includes/classes/conexao.php';
class ingrediente extends Database{
    public $ingrediente;
    private $con;
    public function __construct(){
        $this->con = new Database();
    }
    function getIngrediente(){
        return $this->ingrediente;
    }

    function setIngrediente($ing) {
        $this->ingrediente = $ing;  
    }

    function cadastrar(){
        $query = "INSERT INTO ingredientes (ing_nome) VALUES(:nome)";
        $consulta = $this->con->prepare($query);
        $consulta->bindParam(':nome',$this->ingrediente, PDO::PARAM_STR);
        $consulta->execute();
        $consulta->closeCursor(); 
        $this->con->closeConnection();
        return $this->getIngrediente();
    }
    function buscaIngre(){
        $query = "SELECT * FROM ingredientes";
        $resul = $this->con->prepare($query);
        $resul->execute();
        $resultado = $resul->fetchAll(PDO::FETCH_ASSOC); //Pega varios resultados e devolve um array
        $this->con->closeConnection();
        return json_encode($resultado);
    }
}
?>