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
                <label for="Base">Tamanho da Base (Em Metros):</label>
                <input type="number" name="Base" id="Base"  required>
            </p>
            <p>
                <label for="Altura">Tamanho da Altura (Em Metros):</label>
                <input type="number" name="Altura" id="Altura"  required>
            </p>

            <button type="submit">Enviar</button>
        </fieldset>
    </form>
</body>
</html>

<!--PARTE DO PHP-->
<?php
    function calculoAreaTriangulo($base, $altura) {
        return ($base * $altura) / 2;
    }
    // CHAMANDO O CODIGO PRINCIPAL AO SER ENVIADO O FORMS
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        chamadaPrincipal();
    };
    
    function chamadaPrincipal() {
        try {
            //Verifica os parametros
            if (!isset($_POST['Base']) || !isset($_POST['Altura'])) {
                throw new Exception("Todos os parametros são obrigatórios.");
            }
            if (!is_numeric($_POST['Base']) || !is_numeric($_POST['Altura'])) {
                throw new Exception("Os parâmetros precisam ser numericos");
            }
            if ($_POST['Base'] < 0 || $_POST['Altura'] < 0) {
                throw new Exception("A base e altura não podem ter tamanho negativo");
            }
            
            $base = $_POST['Base'];
            $altura = $_POST['Altura'];
            $area = calculoAreaTriangulo($base, $altura);
            echo "A área do Triangulo com base " . $base . "m e altura " . $altura . "m é de " . $area . " metros quadrados.";
    
        } catch(Exception $e) {
            echo "Mensagem do erro: " . $e->getMessage();
        }
    }
?>
