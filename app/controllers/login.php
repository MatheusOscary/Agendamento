<?php 
require_once '../models/BLL/UsuarioBll.php';
$UsuarioBll = new UsuarioBll();
$login = $UsuarioBll->login($_POST['usuario'],$_POST['senha']);
header('Location: ../../public/');
?>