<?php include '../app/views/header.php'; ?>
<style>
    .perfil-container{
        background-color:#030712; 
        height: 100vh;
    }
    .user-image{
        border-radius: 50%;
        width: 150px;
        height: 150px;
        background-color: #f5f5f5;
    }
    .shop-image{
        border-radius: 50%;
        width: 50px;
        height: 50px;
        background-color: #f5f5f5;
    }
    .job{
        font-size: 14px;
        border-bottom: solid #f5f5f5;
    }
    .group{
        font-size: 14px;
        color: #17A2B8;
    }
</style>
<div class="col-md-12 ">
    <div class="col-md-2 perfil-container">
        <div class="d-flex">
            <div class="col-md-12 text-center">
                Olá, Bem vindo...
            </div>
        </div>
        <div class="d-flex mt-2">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="user-image"></div>
            </div>
        </div>
        <div class="d-flex mt-2">
            <div class="col-md-12 text-center ">
                <b>Murilo</b>
            </div>
        </div>
        <div class="d-flex mt-2 mx-2">
            <div class="col-md-12">
                <div class="d-flex">
                    <div class="col-md-3">
                        <div class="shop-image"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="row job">
                            <b>Barbabeiro</b>
                        </div>
                        <div class="row group">
                            <b>Proprietário</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex mt-2">
            <button>Agendar agora</button>
        </div>
    </div>
    <div class="col-md-10 "></div>
</div>
<?php include '../app/views/footer.php'; ?>