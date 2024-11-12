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
    
    public function select_json(Cliente $cliente) {
        $sql = "SELECT * FROM Cliente WHERE 1=1 AND Cod_loja = " . $_SESSION["Cod_loja"];
    
        if ($cliente->getNome()) {
            $sql .= " AND Nome = '" . $cliente->getNome() . "'";
        }
        if ($cliente->getTelefone()) {
            $sql .= " AND Telefone = '" . $cliente->getTelefone() . "'";
        }
        if ($cliente->getUf()) {
            $sql .= " AND UF = '" . $cliente->getUf() . "'";
        }
        if ($cliente->getCidade()) {
            $sql .= " AND Cidade = '" . $cliente->getCidade() . "'";
        }
        if ($cliente->getCep()) {
            $sql .= " AND CEP = '" . $cliente->getCep() . "'";
        }
        if ($cliente->getBairro()) {
            $sql .= " AND Bairro = '" . $cliente->getBairro() . "'";
        }
        if ($cliente->getRua()) {
            $sql .= " AND Rua = '" . $cliente->getRua() . "'";
        }
        if ($cliente->getDataAniversario()) {
            $sql .= " AND Data_aniversario = '" . $cliente->getDataAniversario() . "'";
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $clientes = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $clientes[] = [
                'Cod_cliente' => $row['Cod_cliente'],
                'Nome' => $row['Nome'],
                'Telefone' => $row['Telefone'],
                'Genero' => $row['Genero'],
                'UF' => $row['UF'],
                'Cidade' => $row['Cidade'],
                'CEP' => $row['CEP'],
                'Bairro' => $row['Bairro'],
                'Rua' => $row['Rua'],
                'Numero' => $row['Numero'],
                'DataAniversario' => $row['Data_aniversario'],
                'DataCadastrou' => $row['Data_cadastrou']
            ];
        }
    
        return $clientes;
    }
    public function select_by_code($cod_cliente){
        $sql = "SELECT * FROM Cliente WHERE 1=1 AND Cod_loja = ". $_SESSION["Cod_loja"] ." AND Cod_cliente = ". $cod_cliente;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row){
            $clienteObj = new Cliente();
            $clienteObj->setCodCliente($row["Cod_cliente"]);
            $clienteObj->setNome($row['Nome']);
            $clienteObj->setTelefone($row['Telefone']);
            $clienteObj->setGenero($row['Genero']);
            $clienteObj->setUf($row['UF']);
            $clienteObj->setCidade($row['Cidade']);
            $clienteObj->setCep($row['CEP']);
            $clienteObj->setBairro($row['Bairro']);
            $clienteObj->setRua($row['Rua']);
            $clienteObj->setNumero($row['Numero']);
            $clienteObj->setDataAniversario($row['Data_aniversario']);
            $clienteObj->setDataCadastrou($row['Data_cadastrou']);
        }
        return $clienteObj;
    }

    public function select(Cliente $cliente) {
        $sql = "SELECT * FROM Cliente WHERE 1=1 AND Cod_loja = ". $_SESSION["Cod_loja"];
        
        if ($cliente->getNome()) {
            $sql .= " AND Nome LIKE '%" . $cliente->getNome() . "%'";
        }
        if ($cliente->getTelefone()) {
            $sql .= " AND Telefone LIKE '%" . $cliente->getTelefone() . "%'";
        }
        if ($cliente->getUf()) {
            $sql .= " AND UF = '" . $cliente->getUf() . "'";
        }
        if ($cliente->getCidade()) {
            $sql .= " AND Cidade LIKE '%" . $cliente->getCidade() . "%'";
        }
        if ($cliente->getCep()) {
            $sql .= " AND CEP LIKE '%" . $cliente->getCep() . "%'";
        }
        if ($cliente->getBairro()) {
            $sql .= " AND Bairro LIKE '%" . $cliente->getBairro() . "%'";
        }
        if ($cliente->getRua()) {
            $sql .= " AND Rua LIKE '%" . $cliente->getRua() . "%'";
        }
        if ($cliente->getDataAniversario()) {
            $sql .= " AND Data_aniversario = '" . $cliente->getDataAniversario() . "'";
        }
        //echo $sql;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        
        $clientes = [];
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $clienteObj = new Cliente();
            $clienteObj->setCodCliente($row["Cod_cliente"]);
            $clienteObj->setNome($row['Nome']);
            $clienteObj->setTelefone($row['Telefone']);
            $clienteObj->setGenero($row['Genero']);
            $clienteObj->setUf($row['UF']);
            $clienteObj->setCidade($row['Cidade']);
            $clienteObj->setCep($row['CEP']);
            $clienteObj->setBairro($row['Bairro']);
            $clienteObj->setRua($row['Rua']);
            $clienteObj->setNumero($row['Numero']);
            $clienteObj->setDataAniversario($row['Data_aniversario']);
            $clienteObj->setDataCadastrou($row['Data_cadastrou']);
            
            $clientes[] = $clienteObj; 
        }
        
        return $clientes;
    }
    
}
?>