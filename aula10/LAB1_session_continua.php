<?php 
    /* Etapa 1 - Tentar iniciar uma sessão e validar se ela já está estabelecida */
    session_start();

    /* Caso não exista o dado "usuário" na global $_SESSION então vamos criar */
    if(isset($_SESSION['usuario'])) {
        /* Caso tenha sido enviado do cliente pelo método POST o identificador do usuário */
        echo "Sessão iniciada. Usuário logado: " . $_SESSION['usuario'] . "<br>";
        echo "O seu identificador de sessão é: " . session_id() . "<br>";
    } else {
        echo "Não foi identificada uma sessão de usuário, você deverá logar";
        echo '<a href="LAB1_session_init.php">Link</a>';
    }
?>