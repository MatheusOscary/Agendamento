<?php
function obterHorariosDisponiveis($servicoDuracao, $intervalosAtendimento, $intervalosAgendados) {
    $horariosDisponiveis = [];

    foreach ($intervalosAtendimento as $intervalo) {
        list($inicio, $fim) = $intervalo;
        $horarioAtual = $inicio;

        // Cria objetos DateTime para facilitar a manipulação
        $inicioDateTime = new DateTime($inicio);
        $fimDateTime = new DateTime($fim);

        while ($inicioDateTime < $fimDateTime) {
            // Converte o horário atual para uma string
            $horarioAtualStr = $inicioDateTime->format('H:i');
            $horarioFim = clone $inicioDateTime;
            $horarioFim->modify("+$servicoDuracao minutes");

            // Verifica se o horário de término está dentro do intervalo
            if ($horarioFim <= $fimDateTime) {
                // Verifica se o novo agendamento se sobrepõe a algum agendamento existente
                $disponivel = true;
                foreach ($intervalosAgendados as $intervaloAgendado) {
                    list($agendadoInicio, $agendadoFim, $codAgendamento) = $intervaloAgendado;
                    $agendadoInicioDateTime = new DateTime($agendadoInicio);
                    $agendadoFimDateTime = new DateTime($agendadoFim);

                    // Verifica se o novo horário se sobrepõe ao agendado
                    if ($inicioDateTime < $agendadoFimDateTime && $horarioFim > $agendadoInicioDateTime) {
                        $disponivel = false;
                        break; // Sai do loop se encontrar uma sobreposição
                    }
                }

                if ($disponivel) {
                    $horariosDisponiveis[] = "$horarioAtualStr-" . $horarioFim->format('H:i');
                }
            }

            // Incrementa o horário atual pela duração do serviço
            $inicioDateTime->modify("+{$servicoDuracao} minutes");
        }
    }

    return $horariosDisponiveis;
}
?>