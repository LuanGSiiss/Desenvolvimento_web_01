<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade 02</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <fieldset>
            <p>
                <label for="num">Número</label>
                <input type="number" name="num" id="num"  required>
            </p>
            <button type="submit">Enviar</button>
        </fieldset>
    </form>
</body>
</html>

<!--PARTE DO PHP-->
<?php
    function divisivelPorDois($numero) {
        return $numero % 2 == 0;
    }
    // CHAMANDO O CODIGO PRINCIPAL AO SER ENVIADO O FORMS
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        chamadaPrincipal();
    };
    
    function chamadaPrincipal() {
        try {
            //Verifica os parametros
            if (!isset($_POST['num'])) {
                throw new Exception("Todos os parametros são obrigatórios.");
            }
            if (!is_numeric($_POST['num']) ) {
                throw new Exception("Os parâmetros precisam ser numericos");
            }
            
            $num = $_POST['num'];
    
            if (divisivelPorDois($num)) {
                echo "Valor divisível por 2";
            } else {
                echo "O valor não é divisível por 2";
            }
        } catch(Exception $e) {
            echo "Mensagem do erro: " . $e->getMessage();
        }
    }
?>