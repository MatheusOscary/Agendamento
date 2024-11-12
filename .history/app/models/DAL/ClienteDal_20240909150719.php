<?php
require_once __DIR__ .'/../Conexao.php';
require_once __DIR__ .'/../Cliente.php';

class ClienteDal{
    private $conn;

    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->conectar();
    }

    $sql = "INSERT INTO Cliente(Nome, Telefone, Genero, UF, Cidade, CEP, Bairro, Rua, Numero, Data_aniversario, Data_cadastrou, Sessao_cadastrou, Cod_loja) VALUES(:nome, :telefone, :genero, :uf, :cidade, :cep, :bairro, :rua, :numero, :data_aniversario, NOW(), :sessao_cadastrou, :cod_loja)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':nome', $cliente->getNome());
    $stmt->bindParam(':telefone', $cliente->getTelefone());
    $stmt->bindParam(':genero', $cliente->getGenero());
    $stmt->bindParam(':uf', $cliente->getUf());
    $stmt->bindParam(':cidade', $cliente->getCidade());
    $stmt->bindParam(':cep', $cliente->getCep());
    $stmt->bindParam(':bairro', $cliente->getBairro());
    $stmt->bindParam(':rua', $cliente->getRua());
    $stmt->bindParam(':numero', $cliente->getNumero());
    $stmt->bindParam(':data_aniversario', $cliente->getDataAniversario());
    $stmt->bindParam(':sessao_cadastrou', $_SESSION["Sessao"]);
    $stmt->bindParam(':cod_loja', $_SESSION["Cod_loja"]);

    $stmt->execute();

}
?>