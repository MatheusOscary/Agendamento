<?php 
include '../app/views/header.php'; 

require_once '../app/models/BLL/LojaBll.php';
require_once '../app/models/BLL/UsuarioBll.php';

$lojaBll = new LojaBll();
$loja = $lojaBll->select(1);
$imagem_loja = $loja->getImagem(); 

$UsuarioBll = new UsuarioBll();
$usuario = $UsuarioBll->select(1);
?>
<style>
    .perfil-container{
        background-color:#030712; 
        height: 100vh;
    }
    .user-image{
        border-radius: 50%;
        width: 150px;
        height: 150px;
    }
    .shop-image{
        overflow: hidden;
        border-radius: 50%;
        width: 50px;
        height: 50px;
    }
    .job{
        font-size: 14px;
        border-bottom: solid #f5f5f5;
    }
    .group{
        font-size: 14px;
        color: #17A2B8;
    }
    .option-menu{
        height:32px;
        background-color: #40475F;
        color: #F5F5F5;
        text-align: center;
        font-weight: bold;
        font-size: 18px;
        align-content: center;
        cursor: pointer;
        transition: filter 0.3s ease;
        opacity: 0.7;
    }
    .option-menu.active{
        opacity: 1;
    }
    .option-menu:hover{

    }
    .conteudo{
        background-color: #40475F;
        opacity: 0.5;
    }
</style>
<div class="col-md-12 d-flex">
    <div class="col-md-2 perfil-container">
        <div class="d-flex">
            <div class="col-md-12 text-center">
                Olá, Bem vindo...
            </div>
        </div>
        <div class="d-flex mt-2">
            <div class="col-md-12 d-flex justify-content-center">
                <a href="" class="img-link">
                    <div class="user-image"><img src="data:image/png;base64,<?= $usuario->getImagem() ?>" alt="" width="100%" height="100%"></div>
                </a>
            </div>
        </div>
        <div class="d-flex mt-2">
            <div class="col-md-12 text-center ">
                <b><?= $usuario->getNome() ?></b> <i class="fa-solid fa-arrow-up-right-from-square"></i>
            </div>
        </div>
        <div class="d-flex mt-2 mx-2">
            <div class="col-md-12">
                <div class="d-flex">
                    <div class="col-md-3">
                        <a href="" class="img-link">
                            <div class="shop-image"><img src="data:image/png;base64,<?= $imagem_loja ?>" alt="" width="100%" height="100%"></div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <div class="row job">
                            <b>Barbabeiro</b>
                        </div>
                        <div class="row group">
                            <b><?= $usuario->getGrupo() ?></b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex mt-4 justify-content-center">
            <button class="button-agd"><i class="fa-solid fa-calendar-days"></i> Agendar Agora</button>
        </div>
        <div class="d-flex mt-4 justify-content-center">
            <button class="button-agd"><i class="fa-solid fa-bars-progress"></i> Gerenciar Agenda</button>
        </div>
    </div>
    
    <div class="col-md-10 ">
        <div class="col-md-12 d-flex">
            <div class="col-md-2 ms-1 option-menu active">Início</div>
            <div class="col-md-2 ms-1 option-menu">Clientes</div>
            <div class="col-md-2 ms-1 option-menu">Agendamentos</div>
            <div class="col-md-2 ms-1 option-menu">Serviços</div>
            <div class="col-md-2 ms-1 option-menu">Profissionais</div>
        </div>
        <div class="col-md-12 d-flex conteudo"></div>
    </div>
</div>
<?php include '../app/views/footer.php'; ?>