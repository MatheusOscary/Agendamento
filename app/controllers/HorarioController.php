<?php
require_once '../models/BLL/HorarioBll.php';


ini_set('session.gc_maxlifetime', 3600);
ini_set('session.cookie_lifetime', 3600);
session_start();
$horarioDal = new HorarioDal();
$intervalos = $horarioDal->array_horario_atendimento('segunda', $_SESSION["Cod_usuario"]);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $HorarioBll = new HorarioBll;
    $HorarioBll->manager($_POST["DiaSemana"], $_POST["Periodo"], $_POST["Horario"]);
    exit;
};
?>