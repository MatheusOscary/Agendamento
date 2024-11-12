<?php
require_once '../models/BLL/HorarioBll.php';
require_once '../models/BLL/AgendamentoBll.php';
require_once '../models/BLL/ServicoBll.php';
require_once '../models/Servico.php';
require_once __DIR__ .'/../helpers/obterHorariosDisponiveis.php';
require_once __DIR__ .'/../helpers/obterDiaSemana.php';
require_once __DIR__ .'/../helpers/ObterIntervalos.php';

ini_set('session.gc_maxlifetime', 3600);
ini_set('session.cookie_lifetime', 3600);
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $agendamento = new Agendamento();

    $agendamento->setCodUsuario($_POST["Cod_usuario"]);
    $agendamento->setCodCliente($_POST["Cod_cliente"]);
    $agendamento->setCodLoja($_SESSION["Cod_loja"]); 
    $agendamento->setCodServico($_POST["Servico"]);

    $dataAgendamento = $_POST["Data"];
    $horario = explode("-", $_POST["horario"]);
    $horaInicio = $horario[0]; 
    $horaTermino = $horario[1];

    $inicia = $dataAgendamento . ' ' . $horaInicio . ":00";
    $termina = $dataAgendamento . ' ' . $horaTermino . ":00";

    $agendamento->setInicia($inicia);
    $agendamento->setTermina($termina);

    $agendamento->setSessaoCadastrou($_SESSION["Sessao"]);

    $agendamentoBll = new AgendamentoBll(); 
    $agendamentoBll->insert($agendamento);

    header('Location: ../../public/');
    exit;
}elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $agendamento = new Agendamento();
    $agendamento->setUsuario($_GET["Usuario"]);
    $agendamento->setCliente($_GET["Cliente"]);
    $agendamento->setCodLoja($_SESSION["Cod_loja"]); 
    $agendamento->setCodServico($_GET["Servico"]);
    $agendamento->setInicia($_GET["Inicia"]);
    $agendamento->setTermina($_GET["Termina"]);
    $agendamento->setEstado($_GET["Estado"]);
    $agendamento->setDataCadastrou($_GET["DataCadastrou"]);
    $agendamentoBll = new AgendamentoBll();
    $servicoBll = new ServicoBll();
    $agendamentos = $agendamentoBll->selectAll($agendamento);
    ?>
    <table>
        <thead>
            <tr>
                <th>Nome Cliente</th>
                <th>Usuário</th>
                <th>Serviço</th>
                <th>Valor</th>
                <th>Estado</th>
                <th>Data</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            
        <?php foreach ($agendamentos as $agendamento) { ?>
            <tr>
                <td><?= $agendamento->getCliente() ?></td>
                <td><?= $agendamento->getUsuario() ?></td>
                <td><?= $agendamento->getServico() ?></td>
                <td>R$ <?= number_format($servicoBll->select_by_code($agendamento->getCodServico())->getPreco(), 2, ',', '.') ?></td>
                <td>
                    <?php
                    $estado = $agendamento->getEstado();
                    if ($estado == 'A') {
                        echo '<span class="text-primary"><b>Agendado</b></span>';
                    } elseif ($estado == 'F') {
                        echo '<span class="text-success"><b>Finalizado</b>Finalizado</span>';
                    } elseif ($estado == 'C') {
                        echo '<span class="text-danger"><b>Cancelado</b>Cancelado</span>';
                    }else{
                        echo $estado;
                    }
                    ?>
                </td>
                <td><?= DateTime::createFromFormat('Y-m-d H:i:s', $agendamento->getDataCadastrou())->format('d/m/Y H:i'); ?></td>
                <td><i class="fa-solid fa-pen-to-square"></i></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php
}
