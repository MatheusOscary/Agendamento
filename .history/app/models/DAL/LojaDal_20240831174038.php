<?php

USE CONNECTION\Conexao;
USE MODEL\Loja;

namespace DAL;

class LojaDal{

    private $conn;

    public function __construct() {
        $this->conn = Conexao::getConnection();
    }

    public function select(){

        $sql = "SELECT * FROM Loja WHERE Cod_loja = 1";
        $result = $this->conn->prepare($sql);
        $result = $this->conn->query($sql);
        $lojas = [];
        
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            printf($row['Nome']);
        }
    }
}
?>