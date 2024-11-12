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
    <title><?= $title ?? 'Início' ?></title>
</head>
<body>
    <?php 
        
        ini_set('session.gc_maxlifetime', 3600);
        ini_set('session.cookie_lifetime', 3600);
        session_start();
        echo $_SESSION['Sessao'];
        if (!isset($_SESSION['Sessao'])) {
            ?>
            
            <form method="POST" action="../app/controllers/login.php">
                <label for="usuario">Usuário:</label>
                <input type="text" name="usuario" required><br>
                
                <label for="senha">Senha:</label>
                <input type="password" name="senha" required><br>
                
                <button type="submit">Entrar</button>
            </form>
            <?php
            exit;
        }
    ?>
