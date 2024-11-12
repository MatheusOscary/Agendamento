<?php
require_once '../app/models/Conexao.php';
require_once '../app/models/Loja.php';

class LojaDal {

    private $conn;

    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->conectar();
    }

    public function select() {
        $sql = "SELECT * FROM Loja WHERE Cod_loja = 1";
        $result = $this->conn->query($sql); 
        $lojas = [];
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $lojas[] = new Loja($row['Cod_loja'], $row['Nome'], $row['CNPJ'], $row['Imagem']);
        }
    }
}
?>
