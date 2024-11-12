<?php
function obterIntervalos($disponibilidade, $agendamentos) {
    $intervalos = [];
    
    foreach ($disponibilidade as $intervalo) {
        $inicioDisponivel = strtotime($intervalo[0]); // Primeira posição: início
        $fimDisponivel = strtotime($intervalo[1]);    // Segunda posição: fim
        
        // Percorrer a disponibilidade em intervalos de 30 minutos
        for ($horaAtual = $inicioDisponivel; $horaAtual < $fimDisponivel; $horaAtual = strtotime('+30 minutes', $horaAtual)) {
            $horaFimAtual = strtotime('+30 minutes', $horaAtual);
            $subIntervalos = [];

            foreach ($agendamentos as $agendamento) {
                $inicioAgendado = strtotime($agendamento[0]);
                $fimAgendado = strtotime($agendamento[1]);

                // Verificar se algum agendamento cai dentro do intervalo de 30 minutos
                if (
                    ($inicioAgendado >= $horaAtual && $inicioAgendado < $horaFimAtual) || 
                    ($fimAgendado > $horaAtual && $fimAgendado <= $horaFimAtual)
                ) {
                    $subIntervalos[] = [
                        'cliente_cod' => $agendamento['2'],
                        'servico_cod' => $agendamento['3'],
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

?>