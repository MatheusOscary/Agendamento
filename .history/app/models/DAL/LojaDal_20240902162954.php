<?php
require_once '../app/models/Conexao.php';
require_once '../app/models/Loja.php';

class LojaDal {

    private $conn;

    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->conectar();
    }

    public function select($id) {
        $sql = "SELECT * FROM Loja WHERE Cod_loja = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $lojas = [];
        if ($row) {
            $lojas[] = new Loja($row['Cod_loja'], $row['Nome'], $row['CNPJ'], base64_encode($row['Imagem']));
        }
        return $lojas;
    }
}
?>
