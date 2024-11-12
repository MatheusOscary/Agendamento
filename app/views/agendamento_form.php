<?php 
require_once '../app/models/BLL/ServicoBll.php';

$servicoBll = new ServicoBll();
$servicos = $servicoBll->select(null, null, null, null, null, null);
?>
<div class="background-form" id="Cad-Agendamento">
    <div class="modal-form-bg">
        <div class="col-md-7 mt-5 px-2 py-3 modal-form">
            <div class="row">
                <div class="modal-title">
                    Agendar
                </div>
            </div>
            <div class="row">
                <div class="modal-body">
                    <form action="../app/controllers/AgendamentoController.php" method="POST" class="needs-validation" novalidate>
                        <div class="filters row">
                            <div class="col-md-12 filter">
                                <div class="Cliente">Cliente: </div>
                                <input name="Cod_cliente" type="hidden" id="Cod_cliente" class="form-control form-control-sm Cod_cliente"/>
                                <input name="Cod_usuario" type="hidden" id="Cod_usuario" value="<?= $_SESSION["Cod_usuario"] ?>" class="form-control form-control-sm Cod_usuario"/>
                            </div>
                            <div class="col-md-3 filter">
                                <label for="Telefone" class="control-label">Telefone</label>
                                <input name="Telefone" type="text" id="Telefone" class="form-control form-control-sm Telefone" required />
                                <div class="invalid-feedback">Por favor, insira um telefone válido.</div>
                            </div>
                            <div class="col-md-3 filter">
                                <label for="Servico" class="control-label">Serviço</label>
                                <select name="Servico" id="Servico" class="form-select form-select-sm" required>
                                    <option selected disabled value="">Selecione a Serviço</option>
                                    <?php foreach ($servicos as $servico){
                                        echo "<option value=". $servico->getCodServico() ." Duracao=". (strtotime($servico->getTempo()) - strtotime('TODAY')) / 60 .">". $servico->getNome() ."</option>";
                                    }?>
                                </select>
                                <div class="invalid-feedback">Por favor, selecione um serviço.</div>
                            </div>
                            <div class="col-md-3 filter">
                                <label for="Data" class="control-label">Data de Agendamento</label>
                                <input name="Data" type="date" id="Data" class="form-control form-control-sm" required />
                                <div class="invalid-feedback">Por favor, insira uma data válida.</div>
                            </div>
                            <div class="col-md-12 filter" id="horarios_disponiveis"></div>
                            <div class="col-md-12 d-flex justify-content-end mb-3">
                                <button type="button" class="button-limpar mx-2" id="Cad-Cancelar-Agendamento">Cancelar</button>
                                <button type="submit" class="button-buscar mx-2">Agendar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .Cliente{
        display:none;
    }
</style>
<script>
    
    (function () {
        'use strict'

        var forms = document.querySelectorAll('.needs-validation')

        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })();

    $(document).ready(function(){
        var today = new Date().toISOString().split('T')[0];
        $('#Data').attr('min', today);
        $('.Telefone').mask('(99) 99999-9999');
        $('#Cad-Cancelar-Agendamento').click(function(){
            $('#Cad-Agendamento').hide();
        });
    });

    $(document).on('change', '#Data, #Servico', function() {
        var codUsuario = '<?= $_SESSION["Cod_usuario"] ?>';
        var data = $('#Data').val();
        var duracao = $('#Servico option:selected').attr("Duracao");

        if (data && duracao) { 
            $.ajax({
                method: "GET",
                url: "../app/controllers/DisponivelController.php",
                data: "Data=" + data + "&Duracao=" + duracao + "&Cod_usuario=" + codUsuario,
                beforeSend: function() {
                    $('#loading-icon').show();
                },
                complete: function() {
                    $('#loading-icon').hide();
                },
                success: function(response) {
                    $('#horarios_disponiveis').html(response);
                }
            });
        }
    });

    $('.Telefone').blur(function(){
        var telefone = $(this).val();
        $.ajax({
            method: "GET",
            url: "../app/controllers/ClienteController.php",
            data: "Telefone=" + telefone + "&Action=BuscaTelefone",
            beforeSend: function() {
                $('#loading-icon').show();
            },
            complete: function() {
                $('#loading-icon').hide();
            },
            success: function(response) {
                if(!(response.status === 'error')){
                    $('.Telefone').prop('disabled', true);  
                    $('.Cliente').show(); 
                    $('.Cliente').html('<b>Cliente: </b>' + response.Nome);
                    $('#Cod_cliente').val(response.Cod_cliente);

                }else{
                    $('.Telefone').val(undefined);
                    Swal.fire({
                        icon: 'warning',
                        title: 'Alerta!',
                        text: response.message,
                        showCancelButton: true,
                        confirmButtonText: 'Cadastrar Cliente',
                        cancelButtonText: 'Cancelar',
                        timer: 10000,
                        timerProgressBar: true,
                        position: 'top',
                        toast: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#Cad-Cancelar-Agendamento').click();
                            $('.option-menu[tab="clientes"]').click()
                        }
                    });
                }
            }
        });
    })
</script>
