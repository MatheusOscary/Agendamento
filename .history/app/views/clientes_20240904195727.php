<div class="col-md-12 d-flex flex-wrap ">
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
            <select name="UF" id="UF" class="form-select form-select-sm" required>
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
        <div class="col-md-12 d-flex justify-content-end mb-3">
            <button class="button-limpar mx-2">Limpar Filtros</button>
            <button class="button-buscar mx-2">Buscar</button>
        </div>
    </div>
    <div class="position-absolute add-btn">
        <button class="button-add">+</button>
    </div>
</div>
<?php include 'clientes_form.php' ?>