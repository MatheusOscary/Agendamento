<?php
require_once __DIR__ .'/../Conexao.php';
require_once __DIR__ .'/../Horario.php';

class HorarioDal{
    private $conn;

    public function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->conectar();
    }
    public function select(){
        $sql = "SELECT * FROM horario_atendimento WHERE Cod_usuario = ". $_SESSION["Cod_usuario"];
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        
        $horario = new Horario;
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $metodo = "set" . $row["Dia_semana"] . "Comeco1";
            $horario->$metodo($row["Comeco_1"]);
            $metodo = "set" . $row["Dia_semana"] . "Fim1";
            $horario->$metodo($row["Fim_1"]);

            $metodo = "set" . $row["Dia_semana"] . "Comeco2";
            $horario->$metodo($row["Comeco_2"]);
            $metodo = "set" . $row["Dia_semana"] . "Fim2";
            $horario->$metodo($row["Fim_2"]);
        }
        return $horario;
    }
    public function select_dia($diaSemana, $codUsuario){
        $sql = "SELECT * FROM horario_atendimento WHERE Cod_usuario = ". $codUsuario ." AND Dia_semana = '". $diaSemana . "'";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        
        $horario = new Horario;
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $metodo = "set" . $row["Dia_semana"] . "Comeco1";
            $horario->$metodo($row["Comeco_1"]);
            $metodo = "set" . $row["Dia_semana"] . "Fim1";
            $horario->$metodo($row["Fim_1"]);

            $metodo = "set" . $row["Dia_semana"] . "Comeco2";
            $horario->$metodo($row["Comeco_2"]);
            $metodo = "set" . $row["Dia_semana"] . "Fim2";
            $horario->$metodo($row["Fim_2"]);
        }
        return $horario;
    }
    public function manager($diaSemana, $periodo, $horario){
        $sql = "CALL AtualizaHorario(". $_SESSION["Cod_loja"] .", ". $_SESSION["Cod_usuario"] .", '". $diaSemana ."', '". $periodo ."', '". $horario ."', ". $_SESSION["Sessao"] .");";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function array_horario_atendimento($diaSemana, $codUsuario) {
        $horario = $this->select_dia($diaSemana, $codUsuario);

        $intervalos = [];
        if ($horario) {
            $metodoComeco1 = "get" . $diaSemana . "Comeco1";
            $metodoFim1 = "get" . $diaSemana . "Fim1";
            $metodoComeco2 = "get" . $diaSemana . "Comeco2";
            $metodoFim2 = "get" . $diaSemana . "Fim2";

            if ($horario->$metodoComeco1() && $horario->$metodoFim1()) {
                $intervalos[] = [
                    date('H:i', strtotime($horario->$metodoComeco1())),
                    date('H:i', strtotime($horario->$metodoFim1()))
                ];
            }
            if ($horario->$metodoComeco2() && $horario->$metodoFim2()) {
                $intervalos[] = [
                    date('H:i', strtotime($horario->$metodoComeco2())),
                    date('H:i', strtotime($horario->$metodoFim2()))
                ];
            }
        }
        
        return $intervalos;
    }
}