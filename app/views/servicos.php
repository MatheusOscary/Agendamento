<script>
    $(document).ready(function(){
        $('.button-add').click(function(){
            $('#Cad-Servico').show();
        })
        $('#buscar-servicos').on('submit', function(event){
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
<div class="col-md-12 d-flex flex-wrap ">
    <form action="../app/controllers/ServicoController.php" id="buscar-servicos" method="GET" >
        <div class="filters filters-dark row">
            <div class="col-md-3 filter">
                <label for="Nome" class="control-label" >Nome</label>
                <input name="Nome" type="text" id="Nome" class="form-control form-control-sm" />
            </div>

            <div class="col-md-3 filter">
                <label for="" class="control-label" >Preço</label>
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text ">De</span>
                    <input type="number" class="form-control form-control-sm" name="Preco_min" placeholder="Valor mínimo">
                    <span class="input-group-text">Até</span>
                    <input type="number" class="form-control form-control-sm" name="Preco_max"  placeholder="Valor máximo">
                </div>
            </div>

            <div class="col-md-3 filter">
                <label for="" class="control-label" >Duração</label>
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text ">De</span>
                    <input type="text" class="form-control form-control-sm Tempo" name="Tempo_min" placeholder="Duração mínima">
                    <span class="input-group-text">Até</span>
                    <input type="text" class="form-control form-control-sm Tempo" name="Tempo_max"  placeholder="Duração máxima">
                </div>
            </div>
            <div class="col-md-2 filter">
                <label for="Data_cadastrou" class="control-label" >Data de Cadastro</label>
                <input name="Data_cadastrou" type="date" id="Data_cadastrou" class="form-control form-control-sm" />
            </div>
            <div class="col-md-12 d-flex justify-content-end mb-3">
                <button class="button-limpar mx-2">Limpar Filtros</button>
                <button class="button-buscar mx-2" type="submit">Buscar</button>
            </div>
        </div>
    </form>
    <div id="response" class="col-md-12"></div>
    <div class="position-absolute add-btn">
        <button class="button-add">+</button>
    </div>
</div>
<?php include 'servicos_form.php' ?>
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
        $('.Tempo').mask('99:99');
        $('#Cad-Cancelar').click(function(){
            $('#Cad-Servico').hide();
        })
    });
</script>