<?php 
require_once '../app/models/BLL/UsuarioBll.php';
$UsuarioBll = new UsuarioBll();
$login = $login->login($_POST['usuario'],$_POST['senha']);
?>