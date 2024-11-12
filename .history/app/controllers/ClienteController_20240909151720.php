<?php
require_once '../models/BLL/ClienteBll.php';
require_once '../models/Cliente.php';
ini_set('session.gc_maxlifetime', 3600);
ini_set('session.cookie_lifetime', 3600);
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cliente = new Cliente();
    $cliente->setNome($_POST["Nome"]);
    $cliente->setTelefone($_POST["Telefone"]);
    $cliente->setGenero($_POST["Genero"]);
    $cliente->setUf($_POST["UF"]);
    $cliente->setCidade($_POST["Cidade"]);
    $cliente->setCep($_POST["Cep"]);
    $cliente->setBairro($_POST["Bairro"]);
    $cliente->setRua($_POST["Rua"]);
    $cliente->setNumero($_POST["Numero"]);
    $cliente->setDataAniversario($_POST["Data_aniversario"]);
    $clienteBll = new ClienteBll();
    $clienteBll->insert($cliente);
    header('Location: ../../public/');
    exit;
}

?>