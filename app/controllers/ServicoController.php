<?php
require_once '../models/BLL/ServicoBll.php';
require_once '../models/Servico.php';
ini_set('session.gc_maxlifetime', 3600);
ini_set('session.cookie_lifetime', 3600);
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servico = new Servico();
    $servico->setNome($_POST["Nome"]);
    $servico->setPreco($_POST["Preco"]);
    $servico->setTempo($_POST["Tempo"]);
    if (isset($_FILES['Imagem']) && $_FILES['Imagem']['error'] === 0) {
        $servico->setImagem(file_get_contents($_FILES['Imagem']['tmp_name']));
    }
    $servicoBll = new servicoBll();
    $servicoBll->insert($servico);
    header('Location: ../../public/');
    exit;
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $nome = isset($_GET["Nome"]) ? $_GET["Nome"] : null;
    $precoMin = isset($_GET["Preco_min"]) ? $_GET["Preco_min"] : null;
    $precoMax = isset($_GET["Preco_max"]) ? $_GET["Preco_max"] : null;
    $tempoMin = isset($_GET["Tempo_min"]) ? $_GET["Tempo_min"] : null;
    $tempoMax = isset($_GET["Tempo_max"]) ? $_GET["Tempo_max"] : null;
    $dataCadastro = isset($_GET["Data_cadastrou"]) ? $_GET["Data_cadastrou"] : null;

    $servicoBll = new ServicoBll();
    $servicos = $servicoBll->select($nome, $precoMin, $precoMax, $tempoMin, $tempoMax, $dataCadastro);


    ?>
    <table>
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Tempo</th>
                <th>Data De Cadastro</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($servicos as $servico) { ?>
            <tr>
                <td><img src="data:image/png;base64,<?= $servico->getImagem() ?>" alt="" width="75x" height="75px"></td>
                <td><?= $servico->getNome() ?></td>
                <td><?= $servico->getPreco() ?></td>
                <td><?= $servico->getTempo() ?></td>
                <td><?= DateTime::createFromFormat('Y-m-d H:i:s', $servico->getDataCadastrou())->format('d/m/Y H:i:s'); ?></td>
                <td><i class="fa-solid fa-pen-to-square"></i></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php

}