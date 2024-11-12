<?php
namespace CONNECTION;
class Conexao {
    private $host = 'localhost';
    private $dbname = 'agd'; 
    private $user = 'root'; 
    private $password = ''; 
    private $pdo;

    public function conectar() {
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->pdo;
        } catch (PDOException $e) {
            echo 'Erro na conexão: ' . $e->getMessage();
        }
    }
}
?>
