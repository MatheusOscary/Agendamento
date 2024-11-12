<?php
    ini_set('session.gc_maxlifetime', 3600);
    ini_set('session.cookie_lifetime', 3600);
    session_start();
    require_once __DIR__ . '/../models/BLL/HorarioBll.php';
    $HorarioBll = new HorarioBll;
    $Horario = $HorarioBll->select();
?>
<style>
    .dia-semana{
        font-weight: bold;
        color: #17A2B8;
    }
</style>
<a href="" class=""><button class="button-buscar mx-2 my-3" type="buttom"><i class="fa-solid fa-arrow-left"></i> Voltar</button></a>
<div class="col-md-12 px-2 py-3 modal-form">
    <div class="d-flex">
        <div class="modal-title">
            Horários de atendimento
        </div>
    </div>
    <div class="d-flex">
        <div class="modal-body">
            <div class="col-md-12">
                <?php
                $diasSemana = [
                    "Domingo" => "domingo",
                    "Segunda-feira" => "segunda",
                    "Terça-feira" => "terca",
                    "Quarta-feira" => "quarta",
                    "Quinta-feira" => "quinta",
                    "Sexta-feira" => "sexta",
                    "Sábado" => "sabado"
                ];

                foreach ($diasSemana as $diaNome => $diaVar) {
                ?>
                    <div class="filters row text-center align-items-center">
                        <div class="col-md-1 dia-semana"><?= $diaNome ?></div>
                        <div class="col-md-1 filter">
                            <label for="<?= ucfirst($diaVar) ?>_comeco_1" class="control-label">Começo</label>
                            <input name="<?= ucfirst($diaVar) ?>_comeco_1" DiaSemana="<?= $diaVar ?>" Periodo="Comeco_1" type="time" id="<?= ucfirst($diaVar) ?>_comeco_1" class="form-control form-control-sm Tempo" value="<?= $Horario->{"get{$diaVar}Comeco1"}(); ?>"  placeholder="HH:MM"/>
                        </div>
                        <div class="col-md-1 filter">
                            <label for="<?= ucfirst($diaVar) ?>_fim_1" class="control-label">Fim</label>
                            <input name="<?= ucfirst($diaVar) ?>_fim_1" type="time" id="<?= ucfirst($diaVar) ?>_fim_1" DiaSemana="<?= $diaVar ?>" Periodo="Fim_1" class="form-control form-control-sm Tempo" value="<?= $Horario->{"get{$diaVar}Fim1"}(); ?>"  placeholder="HH:MM"/>
                        </div>
                        <div class="col-md-1 dia-semana">-</div>
                        <div class="col-md-1 filter">
                            <label for="<?= ucfirst($diaVar) ?>_comeco_2" class="control-label">Começo</label>
                            <input name="<?= ucfirst($diaVar) ?>_comeco_2" type="time" id="<?= ucfirst($diaVar) ?>_comeco_2" DiaSemana="<?= $diaVar ?>" Periodo="Comeco_2"  class="form-control form-control-sm Tempo" value="<?= $Horario->{"get{$diaVar}Comeco2"}(); ?>"  placeholder="HH:MM"/>
                        </div>
                        <div class="col-md-1 filter">
                            <label for="<?= ucfirst($diaVar) ?>_fim_2" class="control-label">Fim</label>
                            <input name="<?= ucfirst($diaVar) ?>_fim_2" type="time" id="<?= ucfirst($diaVar) ?>_fim_2" DiaSemana="<?= $diaVar ?>" Periodo="Fim_2"  class="form-control form-control-sm Tempo" value="<?= $Horario->{"get{$diaVar}Fim2"}(); ?>"  placeholder="HH:MM"/>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on('blur', '.Tempo', function(){
        var DiaSemana = $(this).attr("DiaSemana");
        var Periodo = $(this).attr("Periodo");
        var horario = $(this).val();
        $.ajax({
            method: "POST",
            url: "../app/controllers/HorarioController.php",
            data: "DiaSemana=" + DiaSemana + "&Periodo="+ Periodo +"&Horario=" + horario,
            beforeSend: function() {
                    $('#loading-icon').show();
                },
                complete: function() {
                    $('#loading-icon').hide();
                },
            success: function(){
            }
        })
    });
    $(document).ready(function(){
        $('.Tempo').mask('99:99');
    });
</script>