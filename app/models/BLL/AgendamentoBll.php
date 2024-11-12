<?php
require_once __DIR__ . '/../DAL/AgendamentoDal.php';
require_once __DIR__ . '/../Agendamento.php';

class AgendamentoBll {

    private $AgendamentoDal;

    public function __construct() {
        $this->AgendamentoDal = new AgendamentoDal();
    }

    public function insert(Agendamento $agendamento) {
        return $this->AgendamentoDal->insert($agendamento);
    }

    public function select($data, $codUsuario) {
        return $this->AgendamentoDal->select($data, $codUsuario);
    }

    public function selectAll(Agendamento $agendamento) {
        return $this->AgendamentoDal->selectAll($agendamento);
    }
    
    public function gerarIntervalosAgendados($data, $codUsuario) {
        return $this->AgendamentoDal->gerarIntervalosAgendados($data, $codUsuario);
    }
}
?>
