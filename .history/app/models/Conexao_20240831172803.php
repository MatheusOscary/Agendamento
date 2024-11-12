<?php
namespace CONNECTION
class Conexao {
    private $host = 'localhost'; // Servidor do banco de dados
    private $dbname = 'agd'; // Nome do banco de dados
    private $user = 'root'; // Usuário do banco de dados
    private $password = ''; // Senha do banco de dados (vazio por padrão no XAMPP)
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
