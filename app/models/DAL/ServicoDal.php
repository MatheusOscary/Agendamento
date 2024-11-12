<?php
require_once __DIR__ .'/../Conexao.php';
require_once __DIR__ .'/../Servico.php';

class ServicoDal{
    private $conn;

    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->conectar();
    }

    public function insert(Servico $servico) {
        $sql = "INSERT INTO Servico (Nome, Preco, Tempo, Imagem, Cod_loja, Data_cadastrou, Sessao_cadastrou) VALUES (:Nome, :Preco, :Tempo, :Imagem, :Cod_loja, NOW(), :Sessao_cadastrou)";
        
        $stmt = $this->conn->prepare($sql);
        
        $nome = $servico->getNome();
        $preco = $servico->getPreco();
        $tempo = $servico->getTempo();
        $imagem = $servico->getImagem();
        $codLoja = $_SESSION["Cod_loja"];
        $sessaoCadastrou = $_SESSION["Sessao"];
    
        $stmt->bindParam(':Nome', $nome);
        $stmt->bindParam(':Preco', $preco);
        $stmt->bindParam(':Tempo', $tempo);
        $stmt->bindParam(':Imagem', $imagem, PDO::PARAM_LOB); 
        $stmt->bindParam(':Cod_loja', $codLoja);
        $stmt->bindParam(':Sessao_cadastrou', $sessaoCadastrou);
    
        $stmt->execute();
    }
    public function select_by_code($cod_servico){
        $sql = "SELECT * FROM Servico WHERE 1=1 AND Cod_loja = ". $_SESSION["Cod_loja"] ." AND Cod_servico = ". $cod_servico;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if($row){
            $servicoObj = new Servico();
            $servicoObj->setCodServico($row["Cod_servico"]);
            $servicoObj->setNome($row["Nome"]);
            $servicoObj->setPreco($row["Preco"]);
            $servicoObj->setTempo($row["Tempo"]);
            $servicoObj->setImagem(base64_encode($row["Imagem"]));
            $servicoObj->setDataCadastrou($row["Data_cadastrou"]);
            $servicoObj->setSessaoCadastrou($row["Sessao_cadastrou"]);
            $servicoObj->setDataAtualizou($row["Data_atualizou"]);
            $servicoObj->setSessaoAtualizou($row["Sessao_atualizou"]);
            
            return $servicoObj;
        }
        
        return null;
    }
    

    public function select($nome, $precoMin, $precoMax, $tempoMin, $tempoMax, $dataCadastro) {
        $sql = "SELECT * FROM Servico WHERE 1=1 AND Cod_loja = ". $_SESSION["Cod_loja"];
        
        if ($nome) {
            $sql .= " AND Nome LIKE :Nome";
        }
        if ($precoMin) {
            $sql .= " AND Preco >= :Preco_min";
        }
        if ($precoMax) {
            $sql .= " AND Preco <= :Preco_max";
        }
        if ($tempoMin) {
            $sql .= " AND Tempo >= :Tempo_min";
        }
        if ($tempoMax) {
            $sql .= " AND Tempo <= :Tempo_max";
        }
        if ($dataCadastro) {
            $sql .= " AND Data_cadastrou = :Data_cadastrou";
        }
    
        $stmt = $this->conn->prepare($sql);
    
        if ($nome) {
            $stmt->bindValue(':Nome', '%' . $nome . '%');
        }
        if ($precoMin) {
            $stmt->bindValue(':Preco_min', $precoMin);
        }
        if ($precoMax) {
            $stmt->bindValue(':Preco_max', $precoMax);
        }
        if ($tempoMin) {
            $stmt->bindValue(':Tempo_min', $tempoMin);
        }
        if ($tempoMax) {
            $stmt->bindValue(':Tempo_max', $tempoMax);
        }
        if ($dataCadastro) {
            $stmt->bindValue(':Data_cadastrou', $dataCadastro);
        }
    
        $stmt->execute();
    
        $servicos = [];
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $servicoObj = new Servico();
            $servicoObj->setCodServico($row['Cod_servico']);
            $servicoObj->setNome($row['Nome']);
            $servicoObj->setPreco($row['Preco']);
            $servicoObj->setTempo($row['Tempo']);
            $servicoObj->setImagem(base64_encode($row['Imagem']));
            $servicoObj->setDataCadastrou($row['Data_cadastrou']);
            $servicoObj->setSessaoCadastrou($row['Sessao_cadastrou']);
            $servicoObj->setDataAtualizou($row['Data_atualizou']);
            $servicoObj->setSessaoAtualizou($row['Sessao_atualizou']);
    
            $servicos[] = $servicoObj; 
        }
    
        return $servicos;
    }
    
    
    
}
?>