<div class="col-md-12 d-flex flex-wrap ">
    <div class="filters row">
        <div class="col-md-3 filter">
            <label for="Nome" class="control-label" >Nome</label>
            <input name="Nome" type="text" id="Nome" class="form-control form-control-sm" />
        </div>
        <div class="col-md-2 filter">
            <label for="Telefone" class="control-label" >Telefone</label>
            <input name="Telefone" type="text" id="Telefone" class="form-control form-control-sm" />
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
            <label for="Estado" class="control-label" >Estado</label>
            <input name="Estado" type="text" id="Estado" class="form-control form-control-sm" />
        </div>
        <div class="col-md-3 filter">
            <label for="Cidade" class="control-label" >Cidade</label>
            <input name="Cidade" type="text" id="Cidade" class="form-control form-control-sm" />
        </div>
        <div class="col-md-2 filter">
            <label for="Cep" class="control-label" >CEP</label>
            <input name="Cep" type="text" id="Cep" class="form-control form-control-sm" />
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
<?php include '../app/views/clientes_form.php' ?>