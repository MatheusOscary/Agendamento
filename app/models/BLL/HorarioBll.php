<?php
require_once __DIR__ . '/../DAL/HorarioDal.php';
require_once __DIR__ . '/../Horario.php';

class HorarioBll {

    private $HorarioDal;

    public function __construct() {
        $this->HorarioDal = new HorarioDal();
    }

    public function select() {
        return $this->HorarioDal->select();
    }
    public function manager($diaSemana, $periodo, $horario){
        return $this->HorarioDal->manager($diaSemana, $periodo, $horario);
    }
    public function array_horario_atendimento($diaSemana, $codUsuario){
        return $this->HorarioDal->array_horario_atendimento($diaSemana, $codUsuario);
    }
}
?>
