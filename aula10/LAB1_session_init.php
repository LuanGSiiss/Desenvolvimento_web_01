<?php 
    /* Etapa 1 - Tentar iniciar uma sessão e validar se ela já está estabelecida */
    session_start();

    /* Caso não exista o dado "usuário" na global $_SESSION então vamos criar */
    if(!isset($_SESSION['usuario'])) {
        /* Caso tenha sido enviado do cliente pelo método POST o identificador do usuário */
        $_SESSION['usuario'] = 'user_name';

        echo "Sessão iniciada e usuário registrado.";
        echo '<a href="LAB1_session_continua.php"> Cliqui aqui para continuar</a>';
        foreach ($_SESSION as $elemento) {
            echo $elemento;
        }
    } else {
        echo "O seu identificador de sessão é: " . session_id() . "<br>";
        echo '<a href="LAB1_session_continua.php">Acessar</a>';
    }
?>