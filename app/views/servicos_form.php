<div class="background-form" id="Cad-Servico">
    <div class="modal-form-bg">
        <div class="col-md-7 mt-5 px-2 py-3 modal-form">
            <div class="row">
                <div class="modal-title">
                    Cadastrar Serviço
                </div>
            </div>
            <div class="row">
                <div class="modal-body">
                    <form action="../app/controllers/ServicoController.php" enctype="multipart/form-data" method="POST" class="needs-validation" novalidate>
                        <div class="filters row">
                            <div class="col-md-6 filter">
                                <label for="Nome" class="control-label">Nome</label>
                                <input name="Nome" type="text" id="Nome" class="form-control form-control-sm" required />
                                <div class="invalid-feedback">Por favor, insira o nome.</div>
                            </div>
                            <div class="col-md-3 filter">
                                <label for="" class="control-label" >Preço</label>
                                <input type="number" class="form-control form-control-sm" name="Preco" required placeholder="0.00" step="0.01" min="0">
                                <div class="invalid-feedback">Por favor, insira o preço.</div>
                            </div>

                            <div class="col-md-3 filter">
                                <label for="" class="control-label" >Duração</label>
                                <input type="text" class="form-control form-control-sm Tempo" name="Tempo" required placeholder="HH:MM">
                                <div class="invalid-feedback">Por favor, insira a duração.</div>
                            </div>

                            <div class="col-md-3 filter">
                                <label for="" class="control-label" >Imagem</label>
                                <input class="form-control form-control-sm" type="file" id="Imagem" name="Imagem" accept="image/png, image/jpeg, image/gif" >
                            </div>

                        </div>
                        <div class="col-md-12 d-flex justify-content-end mb-3">
                            <button type="button" class="button-limpar mx-2" id="Cad-Cancelar">Cancelar</button>
                            <button type="submit" class="button-buscar mx-2">Finalizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


