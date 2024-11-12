<?php
ini_set('session.gc_maxlifetime', 3600);
ini_set('session.cookie_lifetime', 3600);
session_start(); 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css" rel="stylesheet">
    <link href="../public/fontawesome/css/fontawesome.css" rel="stylesheet" />
    <link href="../public/fontawesome/css/brands.css" rel="stylesheet" />
    <link href="../public/fontawesome/css/solid.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js
"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title><?= $title ?? 'Início' ?></title>
</head>
<body>
    <?php 
        if (!isset($_SESSION['Sessao'])) {
            ?>
            <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
                <div class="col-md-6 col-lg-2">
                    <form method="POST" action="../app/controllers/login.php">
                        <!-- Logo -->
                        <div class="text-center mb-4">
                            <img src="../public/images/logo.webp" alt="Logo" style="max-width: 100%; height: auto; width: 150px; border-radius:50%;">
                        </div>

                        <!-- Usuário -->
                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuário:</label>
                            <input class="form-control" type="text" name="usuario" required>
                        </div>

                        <!-- Senha -->
                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha:</label>
                            <input class="form-control" type="password" name="senha" required>
                        </div>

                        <!-- Botão -->
                        <button type="submit" class="btn btn-primary w-100">Entrar</button>
                    </form>
                </div>
            </div>


            <?php
            exit;
        }
    ?>
