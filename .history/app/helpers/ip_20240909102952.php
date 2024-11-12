<?php 
    function getIP() {
        // Verificar se o IP está na variável de cabeçalho HTTP_X_FORWARDED_FOR
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            // Pode estar atrás de um proxy
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // Pode estar atrás de um proxy que usa o cabeçalho X-Forwarded-For
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            // Caso contrário, obter diretamente do cliente
            $ip = $_SERVER['REMOTE_ADDR'];
        }
    
        // Filtrar o IP para remover possíveis valores inválidos
        $ip = filter_var($ip, FILTER_VALIDATE_IP);
    
        return $ip;
    }
    
?>