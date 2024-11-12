<?php

namespace DAL;

use CONNECTION\Conexao;
use MODEL\Loja;

class LojaDal {

    private $conn;

    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->conectar();
    }

    public function select() {
        $sql = "SELECT * FROM Loja WHERE Cod_loja = 1";
        $result = $this->conn->query($sql); 

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo $row['Nome']; 
        }
    }
}
?>
