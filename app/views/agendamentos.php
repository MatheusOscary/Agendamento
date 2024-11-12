<?php 
ini_set('session.gc_maxlifetime', 3600);
ini_set('session.cookie_lifetime', 3600);
session_start();
require_once __DIR__ . '/../models/BLL/ServicoBll.php';


$servicoBll = new ServicoBll();
$servicos = $servicoBll->select(null, null, null, null, null, null);
?>
<script>
    $(document).ready(function(){
        $('#buscar-agendamentos').on('submit', function(event){
            event.preventDefault();

            var formData = $(this).serialize(); 
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: formData, 
                beforeSend: function() {
                    $('#loading-icon').show();
                },
                complete: function() {
                    $('#loading-icon').hide();
                },
                success: function(response){
                    $('#response').html(response);
                },
                error: function(xhr, status, error){
                    $('#response').html('<p>Erro ao enviar o formulário!</p><br>'+ xhr.responseText);
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
<div class="col-md-12 d-flex flex-wrap">
    <form action="../app/controllers/AgendamentoController.php" id="buscar-agendamentos" method="GET">
        <div class="filters filters-dark row">
            <div class="col-md-2 filter">
                <label for="Usuario" class="control-label">Usuário</label>
                <input name="Usuario" type="number" id="Usuario" class="form-control form-control-sm" />
            </div>
            <div class="col-md-2 filter">
                <label for="Cliente" class="control-label">Cliente</label>
                <input name="Cliente" type="number" id="Cliente" class="form-control form-control-sm" />
            </div>
            <div class="col-md-3 filter">
                <label for="Servico" class="control-label">Serviço</label>
                <select name="Servico" class="form-select form-select-sm" >
                    <option selected value="">Selecione a Serviço</option>
                    <?php foreach ($servicos as $servico){
                        echo "<option value=". $servico->getCodServico() ." Duracao=". (strtotime($servico->getTempo()) - strtotime('TODAY')) / 60 .">". $servico->getNome() ."</option>";
                    }?>
                </select>
            </div>
            <div class="col-md-3 filter">
                <label for="Inicia" class="control-label">Hora de Início</label>
                <input name="Inicia" type="time" id="Inicia" class="form-control form-control-sm" />
            </div>
            <div class="col-md-3 filter">
                <label for="Termina" class="control-label">Hora de Término</label>
                <input name="Termina" type="time" id="Termina" class="form-control form-control-sm" />
            </div>
            <div class="col-md-3 filter">
                <label for="Estado" class="control-label">Estado</label>
                <select name="Estado" class="form-select form-select-sm" >
                    <option selected value="">Selecione o Estado</option>
                    <option value="A">Agendado</option>
                    <option value="F">Finalizado</option>
                    <option value="C">Cancelado</option>
                </select>
            </div>
            <div class="col-md-3 filter">
                <label for="DataCadastrou" class="control-label">Data de Agendamento</label>
                <input name="DataCadastrou" type="date" id="DataCadastrou" class="form-control form-control-sm" />
            </div>
            <div class="col-md-12 d-flex justify-content-end mb-3">
                <button class="button-limpar mx-2">Limpar Filtros</button>
                <button class="button-buscar mx-2" type="submit">Buscar</button>
            </div>
        </div>
    </form>
    <div id="response" class="col-md-12"></div>
</div>
