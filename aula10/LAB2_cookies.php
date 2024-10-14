<?php
    date_default_timezone_set('America/Sao_Paulo'); //Definindo o fuso horario
    
    if (!isset($_COOKIE["usuario"])) {
        setcookie("usuario", date('Y-m-d H:i:s'), time() + (60 * 5), "/");
    }
?>
<html>
    <body>
    <?php
        if(!isset($_COOKIE["usuario"])) {
            echo "O Cookie 'usuario' não foi definido!";
        } else {
            echo "Cookie 'usuario' definido!<br>";
            echo "O valor é: " . $_COOKIE["usuario"];
        }
    ?>
    </body>
</html>