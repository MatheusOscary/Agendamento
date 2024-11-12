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
    }
</style>
<div class="col-md-12 ">
    <div class="col-md-2 perfil-container">
        <div class="row">
            <div class="col-md-12 text-center">
                Olá, Bem vindo...
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="user-image"></div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12 text-center ">
                <b>Murilo</b>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="col-md-3">
                    <div class="shop-image"></div>
                </div>
                <div class="col-md-9">
                    <div class="row job">
                        <b>Barbabeiro</b>
                    </div>
    
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-10 "></div>
</div>
<?php include '../app/views/footer.php'; ?>