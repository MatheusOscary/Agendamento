<?php
require_once __DIR__ .'/../Conexao.php';
require_once __DIR__ .'/../Cliente.php';

class ClienteDal{
    private $conn;

    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->conectar();
    }

    public function insert(Cliente $cliente){
        $sql = "INSERT INTO Cliente(Nome, Telefone, Genero, UF, Cidade, CEP, Bairro, Rua, Numero, Data_aniversario, Data_cadastrou, Sessao_cadastrou, Cod_loja) VALUES('". $cliente->getNome() ."', '". $cliente->getTelefone() ."', '". $cliente->getGenero() ."', '". $cliente->getUf() ."', '". $cliente->getCidade() ."', '". $cliente->getCep() ."', '". $cliente->getBairro() ."', '". $cliente->getRua() ."', '". $cliente->getNumero() ."', '". $cliente->getDataAniversario() ."', NOW(), ". $_SESSION["Sessao"] .", ". $_SESSION["Cod_loja"] .")";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }
}
?>