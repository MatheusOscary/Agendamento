<?php
require_once __DIR__ .'/../Conexao.php';
require_once __DIR__ .'/../Usuario.php';

class ClienteDal{
    private $conn;

    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->conectar();
    }

    public function insert()
}
?>