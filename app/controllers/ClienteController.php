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
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $cliente = new Cliente();
    
    if (!empty($_GET['Nome'])) {
        $cliente->setNome($_GET['Nome']);
    }
    if (!empty($_GET['Telefone'])) {
        $cliente->setTelefone($_GET['Telefone']);
    }
    if (!empty($_GET['UF'])) {
        $cliente->setUf($_GET['UF']);
    }
    if (!empty($_GET['Cidade'])) {
        $cliente->setCidade($_GET['Cidade']);
    }
    if (!empty($_GET['Cep'])) {
        $cliente->setCep($_GET['Cep']);
    }
    if (!empty($_GET['Bairro'])) {
        $cliente->setBairro($_GET['Bairro']);
    }
    if (!empty($_GET['Rua'])) {
        $cliente->setRua($_GET['Rua']);
    }
    if (!empty($_GET['Data_aniversario'])) {
        $cliente->setDataAniversario($_GET['Data_aniversario']);
    }

    if(!empty($_GET['Action'])){
        $clienteBll = new ClienteBll();
        $clientesFiltrados = $clienteBll->select_json($cliente);
        header('Content-Type: application/json');
        switch ($_GET['Action']){
            case "BuscaTelefone" && !empty($_GET['Telefone']):
                if($clientesFiltrados){
                    echo json_encode($clientesFiltrados[0]);
                }else{
                    echo json_encode([
                        'status' => 'error',
                        'message' => 'Nenhum cliente encontrado.'
                    ]);
                    exit; 
                }
                break;
            default:
                break;
            }
        exit;
    }
    $clienteBll = new ClienteBll();
    $clientesFiltrados = $clienteBll->select($cliente);
        ?>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Aniversário</th>
                <th>Endereço</th>
                <th>Agendamentos</th>
                <th>Data De Cadastro</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($clientesFiltrados as $clienteFiltrado) { ?>
            <tr>
                <td><?= $clienteFiltrado->getNome() ?></td>
                <td><?= $clienteFiltrado->getTelefone() ?></td>
                <td><?= DateTime::createFromFormat('Y-m-d', $clienteFiltrado->getDataAniversario())->format('d/m/Y'); ?></td>
                <td><?= $clienteFiltrado->getRua() . ' ' . $clienteFiltrado->getNumero() . ', ' . $clienteFiltrado->getBairro() . ', ' . $clienteFiltrado->getCidade() . '-' . $clienteFiltrado->getUf() ?></td>
                <td>0</td>
                <td><?= DateTime::createFromFormat('Y-m-d H:i:s', $clienteFiltrado->getDataCadastrou())->format('d/m/Y H:i:s'); ?></td>
                <td><i class="fa-solid fa-pen-to-square"></i></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php
}

?>