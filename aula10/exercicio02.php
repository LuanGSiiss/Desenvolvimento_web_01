<?php
    date_default_timezone_set('America/Sao_Paulo'); //Definindo o fuso horario
    
    if (!isset($_COOKIE["usuario"])) {
        setcookie("usuario", date('Y-m-d H:i:s'), time() + (60 * 5), "/");
    }
?>
<html>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <label for="nome_cookie">Nome do cookie:</label>
            <input type="text" name="nome_cookie" required>

            <button type="submit">Enviar</button>
        </form>
        
    </body>
</html>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        chamadaPrincipal();
    };
    function chamadaPrincipal() {
        if(isset($_COOKIE['usuario']) && $_POST['nome_cookie'] == 'usuario') {
            echo "Cookie 'usuario' definido!<br>";
            echo "O valor é: " . $_COOKIE["usuario"];
        } else {
            echo "O Cookie não foi definido!";
        }
    }
?>