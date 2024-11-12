
<?php
require_once '../models/BLL/HorarioBll.php';
require_once '../models/BLL/AgendamentoBll.php';
require_once __DIR__ .'/../helpers/obterHorariosDisponiveis.php';
require_once __DIR__ .'/../helpers/obterDiaSemana.php';

ini_set('session.gc_maxlifetime', 3600);
ini_set('session.cookie_lifetime', 3600);
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $horarioBll = new HorarioBll();
    $intervalos = $horarioBll->array_horario_atendimento(obterDiaSemana($_GET["Data"]), $_GET["Cod_usuario"]);
    $agendamentoBll = new AgendamentoBll();
    $intervalosAgendados = $agendamentoBll->gerarIntervalosAgendados($_GET["Data"], $_GET["Cod_usuario"]);
    $servicoDuracao = $_GET["Duracao"]; 
    $horariosDisponiveis = obterHorariosDisponiveis($servicoDuracao, $intervalos, $intervalosAgendados);
    ?>
    <div class="row align-content-center">
        <div class="col-md-12">
            <b>Selecione um horário</b>
        </div>
        <?php foreach ($horariosDisponiveis as $horario) { ?>
            <div class="col-md-2 m-1">
                <input type="radio" class="btn-check" name="horario" id="<?= $horario ?>" value="<?= $horario ?>" autocomplete="off" required>
                <label class="btn btn-primary" for="<?= $horario ?>"><?= $horario ?></label>
                <div class="invalid-feedback">Por favor, selecione um horário válido.</div>
            </div>
        <?php } ?>
    </div>
    <?php
}






?>