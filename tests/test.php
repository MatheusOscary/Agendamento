<?php
function gerarIntervalos($disponibilidade, $agendamentos) {
    $intervalos = [];
    
    foreach ($disponibilidade as $intervalo) {
        $inicioDisponivel = strtotime($intervalo['inicio']);
        $fimDisponivel = strtotime($intervalo['fim']);
        
        // Percorrer a disponibilidade em intervalos de 30 minutos
        for ($horaAtual = $inicioDisponivel; $horaAtual < $fimDisponivel; $horaAtual = strtotime('+30 minutes', $horaAtual)) {
            $horaFimAtual = strtotime('+30 minutes', $horaAtual);
            $subIntervalos = [];

            foreach ($agendamentos as $agendamento) {
                $inicioAgendado = strtotime($agendamento['inicio']);
                $fimAgendado = strtotime($agendamento['fim']);

                // Verificar se algum agendamento cai dentro do intervalo de 30 minutos
                if (
                    ($inicioAgendado >= $horaAtual && $inicioAgendado < $horaFimAtual) || 
                    ($fimAgendado > $horaAtual && $fimAgendado <= $horaFimAtual)
                ) {
                    $subIntervalos[] = [
                        'cliente_nome' => $agendamento['cliente'],
                        'cliente_cod' => $agendamento['cod_cliente'],
                        'servico_nome' => $agendamento['servico'],
                        'servico_cod' => $agendamento['cod_servico'],
                        'agendamento_inicio' => date('H:i', $inicioAgendado),
                        'agendamento_fim' => date('H:i', $fimAgendado)
                    ];
                }
            }

            // Adicionar ao intervalo (mesmo vazio)
            $intervalos[] = [
                'inicio' => date('H:i', $horaAtual),
                'fim' => date('H:i', $horaFimAtual),
                'subintervalos' => $subIntervalos
            ];
        }
    }

    return $intervalos;
}

// Disponibilidade do funcionário
$disponibilidade = [
    ['inicio' => '08:00', 'fim' => '12:00'],
    ['inicio' => '13:00', 'fim' => '18:00']
];

// Agendamentos do dia
$agendamentos = [
    ['inicio' => '08:00', 'fim' => '08:15', 'cliente' => 'Matheus Oscar', 'cod_cliente' => 1, 'servico' => 'Corte Social', 'cod_servico' => 10],
    ['inicio' => '08:15', 'fim' => '08:30', 'cliente' => 'Paulo Cesar', 'cod_cliente' => 2, 'servico' => 'Barba', 'cod_servico' => 20],
    ['inicio' => '10:00', 'fim' => '10:30', 'cliente' => 'Fernando', 'cod_cliente' => 3, 'servico' => 'Corte Degrade', 'cod_servico' => 30]
];

// Gerar intervalos com subintervalos
$intervalos = gerarIntervalos($disponibilidade, $agendamentos);

// Exibir como JSON
header('Content-Type: application/json');
echo json_encode($intervalos);


?>