<?php
require_once __DIR__ .'/../Conexao.php';
require_once __DIR__ .'/../Agendamento.php';

class AgendamentoDal{
    private $conn;

    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->conectar();
    }
    public function insert(Agendamento $agendamento) {
        $sql = "INSERT INTO Agendamento (Cod_usuario, Cod_cliente, Cod_loja, Cod_servico, Inicia, Termina, Data_cadastrou, Sessao_Cadastrou) 
                VALUES (:Cod_usuario, :Cod_cliente, :Cod_loja, :Cod_servico, :Inicia, :Termina, NOW(), :Sessao_Cadastrou)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(':Cod_usuario', $agendamento->getCodUsuario(), PDO::PARAM_INT);
        $stmt->bindValue(':Cod_cliente', $agendamento->getCodCliente(), PDO::PARAM_INT);
        $stmt->bindValue(':Cod_loja', $agendamento->getCodLoja(), PDO::PARAM_INT);
        $stmt->bindValue(':Cod_servico', $agendamento->getCodServico(), PDO::PARAM_INT);
        $stmt->bindValue(':Inicia', $agendamento->getInicia(), PDO::PARAM_STR);
        $stmt->bindValue(':Termina', $agendamento->getTermina(), PDO::PARAM_STR);
        $stmt->bindValue(':Sessao_Cadastrou', $agendamento->getSessaoCadastrou(), PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true; 
        } else {
            return false;
        }
    }

    public function selectAll(Agendamento $agendamento) {
        $sql = "SELECT 
                    a.Cod_agendamento,
                    a.Cod_usuario,
                    u.Nome as Usuario_Nome,
                    a.Cod_cliente,
                    c.Nome as Cliente_Nome,
                    a.Cod_loja,
                    l.Nome as Loja_Nome,
                    a.Cod_servico,
                    s.Nome as Servico_Nome,
                    a.Inicia,
                    a.Termina,
                    a.Estado,
                    a.Data_cadastrou,
                    a.Sessao_cadastrou,
                    a.Data_atualizou,
                    a.Sessao_atualizou
                FROM 
                    Agendamento a
                INNER JOIN 
                    Usuario u ON a.Cod_usuario = u.Cod_usuario
                INNER JOIN 
                    Cliente c ON a.Cod_cliente = c.Cod_cliente
                INNER JOIN 
                    Loja l ON a.Cod_loja = l.Cod_loja
                INNER JOIN 
                    Servico s ON a.Cod_servico = s.Cod_servico
                WHERE 1=1";
    
        if ($agendamento->getUsuario()) {
            $sql .= " AND u.Nome LIKE '%" . $agendamento->getUsuario() . "%'";
        }
        if ($agendamento->getCliente()) {
            $sql .= " AND c.Nome LIKE '%" . $agendamento->getCliente() . "%'";
        }
        if ($agendamento->getEstado()) {
            $sql .= " AND a.Estado = '" . $agendamento->getEstado() ."'";
        }
        if ($agendamento->getCodLoja()) {
            $sql .= " AND a.Cod_loja = " . $agendamento->getCodLoja();
        }
        if ($agendamento->getCodServico()) {
            $sql .= " AND a.Cod_servico = " . $agendamento->getCodServico();
        }
        if ($agendamento->getInicia()) {
            $sql .= " AND a.Inicia >= '" . $agendamento->getInicia() . "'";
        }
        if ($agendamento->getTermina()) {
            $sql .= " AND a.Termina <= '" . $agendamento->getTermina() . "'";
        }
        if ($agendamento->getDataCadastrou()) {
            $sql .= " AND DATE(a.Data_cadastrou) = '" . $agendamento->getDataCadastrou() . "'";
        }
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    
        $Agendamentos = [];
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $agendamentoObj = new Agendamento();
            $agendamentoObj->setCodAgendamento($row['Cod_agendamento']);
            $agendamentoObj->setUsuario($row['Usuario_Nome']);
            $agendamentoObj->setCodUsuario($row['Cod_usuario']);
            $agendamentoObj->setCliente($row['Cliente_Nome']);
            $agendamentoObj->setCodCliente($row['Cod_cliente']);
            $agendamentoObj->setCodLoja($row['Cod_loja']);
            $agendamentoObj->setServico($row['Servico_Nome']);
            $agendamentoObj->setCodServico($row['Cod_servico']);
            $agendamentoObj->setInicia($row['Inicia']);
            $agendamentoObj->setTermina($row['Termina']);
            $agendamentoObj->setEstado($row['Estado']);
            $agendamentoObj->setDataCadastrou($row['Data_cadastrou']);
            $agendamentoObj->setSessaoCadastrou($row['Sessao_cadastrou']);
            $agendamentoObj->setDataAtualizou($row['Data_atualizou']);
            $agendamentoObj->setSessaoAtualizou($row['Sessao_atualizou']);
    
            $Agendamentos[] = $agendamentoObj;
        }
    
        return $Agendamentos;
    }
    
    

    public function select($data, $codUsuario){
        $sql = "SELECT * FROM Agendamento WHERE Cod_usuario = ". $codUsuario ." AND DATE(Inicia) = '". $data ."' AND DATE(Termina) = '". $data ."' " ;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        
        $Agendamentos = [];
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $agendamento = new Agendamento();
    
            $agendamento->setCodAgendamento($row['Cod_agendamento']);
            $agendamento->setCodUsuario($row['Cod_usuario']);
            $agendamento->setCodCliente($row['Cod_cliente']);
            $agendamento->setCodLoja($row['Cod_loja']);
            $agendamento->setCodServico($row['Cod_servico']);
            $agendamento->setInicia($row['Inicia']);
            $agendamento->setTermina($row['Termina']);
            $agendamento->setEstado($row['Estado']);
            $agendamento->setDataCadastrou($row['Data_cadastrou']);
            $agendamento->setSessaoCadastrou($row['Sessao_cadastrou']);
            $agendamento->setDataAtualizou($row['Data_atualizou']);
            $agendamento->setSessaoAtualizou($row['Sessao_atualizou']);
    
            $Agendamentos[] = $agendamento;
        }
        return $Agendamentos;
    }

    public function gerarIntervalosAgendados($data, $codUsuario) {
        $agendamentos = $this->select($data, $codUsuario);
        $intervalosAgendados = [];
    
        foreach ($agendamentos as $agendamento) {
            $inicia = date('H:i', strtotime($agendamento->getInicia()));
            $termina = date('H:i', strtotime($agendamento->getTermina()));
            
            $intervalosAgendados[] = [$inicia, $termina, $agendamento->getCodCliente(), $agendamento->getCodServico()];
        }
    
        return $intervalosAgendados; 
    }
    
    
}
?>