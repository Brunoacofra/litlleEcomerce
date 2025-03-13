<?php
class Database {
    private $host = "localhost:3300"; 
    private $dbname = "litlleEcomerce"; 
    private $username = "root"; 
    private $password = ""; 
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            //echo "Conexão bem-sucedida!";
        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn = null;
    }
}
$database = new Database();
$conn = $database->getConnection();
?>
