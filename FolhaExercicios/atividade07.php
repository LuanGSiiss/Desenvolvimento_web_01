<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade 07</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <fieldset>
            <p>
                <label for="valorEmprestimo">Valor do emprestimo:</label>
                <input type="number" step="0.01" name="valorEmprestimo" required>
            </p>
            <p>
                <label for="qtdParcelas">Quantidade de parcelas:</label>
                <input type="number" step="0.01"name="qtdParcelas" required>
            </p>
            <p>
                <label for="valorParcela">Valor de cada parcela:</label>
                <input type="number" step="0.01" name="valorParcela" required>
            </p>

            <button type="submit">Enviar</button>
        </fieldset>
    </form>
</body>
</html>

<!--PARTE DO PHP-->
<?php

    function calculoJuros($capital, $qtdParcelas, $valorParcela) {
        $montandeFinal = $qtdParcelas * $valorParcela;
        $juros = $montandeFinal - $capital;
        return $juros;
    }

    // CHAMANDO O CODIGO PRINCIPAL AO SER ENVIADO O FORMS
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        chamadaPrincipal();
    };
    
    function chamadaPrincipal() {
        try {
            //Verifica os parametros
            if (!isset($_POST['valorEmprestimo']) || !isset($_POST['qtdParcelas']) || !isset($_POST['valorParcela'])) {
                throw new Exception("Os todos os parametros são obrigatórios.");
            }
            if (!is_numeric($_POST['valorEmprestimo']) || !is_numeric($_POST['qtdParcelas']) || !is_numeric($_POST['valorParcela'])) {
                throw new Exception("Os parâmetros precisam ser numericos");
            }
            if ($_POST['valorEmprestimo'] < 0 || $_POST['qtdParcelas'] < 0 || $_POST['valorParcela'] < 0 ) {
                throw new Exception("As quantidades não podem ser negativas");
            }

            $capital = $_POST['valorEmprestimo'];
            $qtdParcelas = $_POST['qtdParcelas'];
            $valorParcela = $_POST['valorParcela'];
            
            echo "Valor pretendido para emprestimo R$" . $capital . "<br>";
            echo "Valor pago de juros R$" . calculoJuros($capital, $qtdParcelas, $valorParcela); 
        } catch(Exception $e) {
            echo "Mensagem do erro: " . $e->getMessage();
        }
    }
?>