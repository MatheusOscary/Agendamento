<?php 
require_once '../models/BLL/UsuarioBll.php';
$UsuarioBll = new UsuarioBll();
$login->login($_POST['usuario'],$_POST['senha']);
?>