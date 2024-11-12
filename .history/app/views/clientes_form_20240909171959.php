<div class="background-form" id="Cad-Cliente">
    <div class="modal-form-bg">
        <div class="col-md-7 mt-5 px-2 py-3 modal-form">
            <div class="row">
                <div class="modal-title">
                    Cadastrar Cliente
                </div>
            </div>
            <div class="row">
                <div class="modal-body">
                    <form action="../app/controllers/ClienteController.php" method="POST" class="needs-validation" novalidate>
                        <div class="filters row">
                            <div class="col-md-6 filter">
                                <label for="Nome" class="control-label">Nome</label>
                                <input name="Nome" type="text" id="Nome" class="form-control form-control-sm" required />
                                <div class="invalid-feedback">Por favor, insira o nome.</div>
                            </div>
                            <div class="col-md-4 filter">
                                <label for="Telefone" class="control-label">Telefone</label>
                                <input name="Telefone" type="text" id="Telefone" class="form-control form-control-sm Telefone" required />
                                <div class="invalid-feedback">Por favor, insira um telefone válido.</div>
                            </div>
                            <div class="col-md-6 filter">
                                <label for="Email" class="control-label">E-mail</label>
                                <input name="Email" type="email" id="Email" class="form-control form-control-sm" required />
                                <div class="invalid-feedback">Por favor, insira um e-mail válido.</div>
                            </div>
                            <div class="col-md-3 filter">
                                <label for="Data_aniversario" class="control-label">Data de Aniversário</label>
                                <input name="Data_aniversario" type="date" id="Data_aniversario" class="form-control form-control-sm" required />
                                <div class="invalid-feedback">Por favor, insira uma data válida.</div>
                            </div>
                            <div class="col-md-3 filter">
                                <label for="Genero" class="control-label">Gênero</label>
                                <select name="Genero" id="Genero" class="form-select form-select-sm" required>
                                    <option selected disabled value="">Selecione o Gênero</option>
                                    <option value="M">Masculino</option>
                                    <option value="F">Feminino</option>
                                    <option value="O">Outro</option>
                                </select>
                                <div class="invalid-feedback">Por favor, selecione um gênero.</div>
                            </div>
                            <div class="col-md-3 filter">
                                <label for="UF" class="control-label">Estado</label>
                                <select name="UF" id="UF" class="form-select form-select-sm" required>
                                    <option selected disabled value="">Selecione a UF</option>
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
                                <div class="invalid-feedback">Por favor, selecione um estado.</div>
                            </div>
                            <div class="col-md-3 filter">
                                <label for="Cidade" class="control-label">Cidade</label>
                                <input name="Cidade" type="text" id="Cidade" class="form-control form-control-sm" required />
                                <div class="invalid-feedback">Por favor, insira a cidade.</div>
                            </div>
                            <div class="col-md-2 filter">
                                <label for="Cep" class="control-label">CEP</label>
                                <input name="Cep" type="text" id="Cep" class="form-control form-control-sm Cep" required />
                                <div class="invalid-feedback">Por favor, insira um CEP válido.</div>
                            </div>
                            <div class="col-md-3 filter">
                                <label for="Bairro" class="control-label">Bairro</label>
                                <input name="Bairro" type="text" id="Bairro" class="form-control form-control-sm" required />
                                <div class="invalid-feedback">Por favor, insira o bairro.</div>
                            </div>
                            <div class="col-md-3 filter">
                                <label for="Rua" class="control-label">Rua</label>
                                <input name="Rua" type="text" id="Rua" class="form-control form-control-sm" required />
                                <div class="invalid-feedback">Por favor, insira a rua.</div>
                            </div>
                            <div class="col-md-3 filter">
                                <label for="Numero" class="control-label">Número</label>
                                <input name="Numero" type="text" id="Numero" class="form-control form-control-sm" required />
                                <div class="invalid-feedback">Por favor, insira o número.</div>
                            </div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-end mb-3">
                            <button type="button" class="button-limpar mx-2">Cancelar</button>
                            <button type="submit" class="button-buscar mx-2">Finalizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


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
    });
</script>