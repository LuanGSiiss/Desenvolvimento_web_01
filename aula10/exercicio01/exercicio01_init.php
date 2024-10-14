<?php
    session_start();

    date_default_timezone_set('America/Sao_Paulo'); //Definindo o fuso horario

    if(!isset($_SESSION['usuario']) && !isset($_SESSION['senha'])) {
        $_SESSION['usuario'] = $_POST['usuario'];
        $_SESSION['senha'] = $_POST['senha'];
        $_SESSION['data_inicio'] = date('Y-m-d H:i:s');
        $_SESSION['data_ultima_req'] = date('Y-m-d H:i:s');

        echo "Usuario: " . $_SESSION['usuario'] . "<br>";
        echo "Data/Hora primeiro login: " .  $_SESSION['data_inicio'] . "<br>";
        echo '<a href="exercicio01_continua.php">Continuar sessão na outra pagina</a>';
    } else {
        echo "O seu identificador de sessão é: " . session_id() . "<br>";
        echo '<a href="exercicio01_continua.php">Continuar sessão na outra pagina</a>';
    }

?>