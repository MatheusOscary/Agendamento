<?php
require_once __DIR__ . '/../DAL/ServicoDal.php';
require_once __DIR__ . '/../Servico.php';

class ServicoBll {

    private $ServicoDal;

    public function __construct() {
        $this->ServicoDal = new ServicoDal();
    }

    public function insert(Servico $servico) {
        $this->ServicoDal->insert($servico);
    }

    public function select($nome, $precoMin, $precoMax, $tempoMin, $tempoMax, $dataCadastro) {
        return $this->ServicoDal->select($nome, $precoMin, $precoMax, $tempoMin, $tempoMax, $dataCadastro);
    }
    public function select_by_code($cod_servico){
        return $this->ServicoDal->select_by_code($cod_servico);
    }
}
?>
