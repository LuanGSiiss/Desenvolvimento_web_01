<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade 03</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <fieldset>
            <p>
                <label for="TamLado">Tamanho dos lados(Em Metros):</label>
                <input type="number" name="TamLado" id="TamLado"  required>
            </p>
            <button type="submit">Enviar</button>
        </fieldset>
    </form>
</body>
</html>

<!--PARTE DO PHP-->
<?php
    function calculoAreaQuadrado($lado) {
        return $lado * $lado;
    }
    // CHAMANDO O CODIGO PRINCIPAL AO SER ENVIADO O FORMS
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        chamadaPrincipal();
    };
    
    function chamadaPrincipal() {
        try {
            //Verifica os parametros
            if (!isset($_POST['TamLado'])) {
                throw new Exception("Todos os parametros são obrigatórios.");
            }
            if (!is_numeric($_POST['TamLado']) ) {
                throw new Exception("Os parâmetros precisam ser numericos");
            }
            if ($_POST['TamLado'] < 0) {
                throw new Exception("Lado não pode ser negativo");
            }
            
            $lado = $_POST['TamLado'];
            $area = calculoAreaQuadrado($lado);
    
            echo "A área do quadrado com lado de " . $lado . " metros é " . $area . " metros quadrados.";
        } catch(Exception $e) {
            echo "Mensagem do erro: " . $e->getMessage();
        }
    }
?>