<?php
require_once '../models/BLL/ClienteBll.php';
require_once '../models/Cliente.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente = new Cliente();
    $cliente->setNome($_POST["Nome"]);
    $cliente->setTelefone($_POST["Telefone"]);
    $cliente->setGenero($_POST["Genero"]);
    $cliente->setGenero($_POST["Genero"]);
}

?>