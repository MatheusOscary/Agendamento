<?php
    function obterDiaSemana($date){
        $diaDaSemana = strtolower(iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', date('l', strtotime($date))));
        $dias = [
            'monday' => 'segunda',
            'tuesday' => 'terca',
            'wednesday' => 'quarta',
            'thursday' => 'quinta',
            'friday' => 'sexta',
            'saturday' => 'sabado',
            'sunday' => 'domingo'
        ];

        $diaFormatado = $dias[$diaDaSemana];
        return $diaFormatado; 

    }
?>