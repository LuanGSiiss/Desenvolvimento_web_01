<?php
    session_start();

    date_default_timezone_set('America/Sao_Paulo'); //Definindo o fuso horario

    if(isset($_SESSION['usuario'])) {
        echo "Usuario: " . $_SESSION['usuario'] . "<br>";
        echo "Senha: " . $_SESSION['senha'] . "<br>";
        echo "Data/Hora primeiro login: " .  $_SESSION['data_inicio'] . "<br>";
        // Exibe depois atualiza
        echo "Data/Hora da última requisição: " . $_SESSION['data_ultima_req'] . "<br>";
        $_SESSION['data_ultima_req'] = date('Y-m-d H:i:s');
        
        // Cria ou atualiza o tempo de sessão
        $data_inicio = new DateTime($_SESSION['data_inicio']);
        $data_final = new DateTime($_SESSION['data_ultima_req']);
        
        $_SESSION['tempo_sessao'] = $data_inicio->diff($data_final);
        $totalTem = $_SESSION['tempo_sessao'];
        echo "Tempo total da Sessão: " . $totalTem->days . " dias, time: " . $totalTem->h . ":" . $totalTem->i . ":" . $totalTem->s; 
    } else {
        echo "Não foi identificada uma sessão de usuário, você deverá logar";
        echo '<a href="exercicio01_init.php">Link</a>';
    }

?>