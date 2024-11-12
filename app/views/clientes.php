<script>
    $(document).ready(function(){
        $('.button-add').click(function(){
            $('#Cad-Cliente').show();
        })
        $('#buscar-clientes').on('submit', function(event){
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
    <form action="../app/controllers/ClienteController.php" id="buscar-clientes" method="GET" >
        <div class="filters filters-dark row">
            <div class="col-md-3 filter">
                <label for="Nome" class="control-label" >Nome</label>
                <input name="Nome" type="text" id="Nome" class="form-control form-control-sm" />
            </div>
            <div class="col-md-2 filter">
                <label for="Telefone" class="control-label" >Telefone</label>
                <input name="Telefone" type="text" id="Telefone" class="form-control form-control-sm Telefone" />
            </div>
            <div class="col-md-3 filter">
                <label for="Email" class="control-label" >E-mail</label>
                <input name="Email" type="email" id="Email" class="form-control form-control-sm" />
            </div>
            <div class="col-md-2 filter">
                <label for="Data_aniversario" class="control-label" >Data de Aniversário</label>
                <input name="Data_aniversario" type="date" id="Data_aniversario" class="form-control form-control-sm" />
            </div>
            <div class="col-md-3 filter">
                <label for="UF" class="control-label" >Estado</label>
                <select name="UF" id="UF" class="form-select form-select-sm" >
                    <option value="" selected>Selecione a UF</option>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                </select>
            </div>
            <div class="col-md-3 filter">
                <label for="Cidade" class="control-label" >Cidade</label>
                <input name="Cidade" type="text" id="Cidade" class="form-control form-control-sm" />
            </div>
            <div class="col-md-2 filter">
                <label for="Cep" class="control-label" >CEP</label>
                <input name="Cep" type="text" id="Cep" class="form-control form-control-sm Cep" />
            </div>
            <div class="col-md-3 filter">
                <label for="Bairro" class="control-label" >Bairro</label>
                <input name="Bairro" type="text" id="Bairro" class="form-control form-control-sm" />
            </div>
            <div class="col-md-3 filter">
                <label for="Rua" class="control-label" >Rua</label>
                <input name="Rua" type="text" id="Rua" class="form-control form-control-sm" />
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
<?php include 'clientes_form.php' ?>
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
        $('.Telefone').mask('(99) 99999-9999');
        $('.Cep').mask('00000-000');
        $('#Cad-Cancelar').click(function(){
            $('#Cad-Cliente').hide();
        })
    });
</script>