<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade 04</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <fieldset>
            <p>
                <label for="LadoA">Tamanho lado A (Em Metros):</label>
                <input type="number" name="LadoA" id="LadoA"  required>
            </p>
            <p>
                <label for="LadoB">Tamanho lado B (Em Metros):</label>
                <input type="number" name="LadoB" id="LadoB"  required>
            </p>

            <button type="submit">Enviar</button>
        </fieldset>
    </form>
</body>
</html>

<!--PARTE DO PHP-->
<?php
    function calculoAreaRetangulo($ladoA, $ladoB) {
        return $ladoA * $ladoB;
    }
    // CHAMANDO O CODIGO PRINCIPAL AO SER ENVIADO O FORMS
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        chamadaPrincipal();
    };
    
    function chamadaPrincipal() {
        try {
            //Verifica os parametros
            if (!isset($_POST['LadoA']) || !isset($_POST['LadoB'])) {
                throw new Exception("Todos os parametros são obrigatórios.");
            }
            if (!is_numeric($_POST['LadoA']) || !is_numeric($_POST['LadoB'])) {
                throw new Exception("Os parâmetros precisam ser numericos");
            }
            if ($_POST['LadoA'] < 0 || $_POST['LadoB'] < 0) {
                throw new Exception("Um lado não pode ter tamanho negativo");
            }
            
            $ladoA = $_POST['LadoA'];
            $ladoB = $_POST['LadoB'];
            $area = calculoAreaRetangulo($ladoA, $ladoB);
            $mensagemPronta = "A área do retângulo com lados " . $ladoA . " e " . $ladoB . " metros é de " . $area . " metros quadrados.";
    
            if ($area > 10) {
                echo "<h1>" . $mensagemPronta . "</h1>";
            } else {
                echo "<h3>" . $mensagemPronta . "</h3>";
            }
        } catch(Exception $e) {
            echo "Mensagem do erro: " . $e->getMessage();
        }
    }
?>
