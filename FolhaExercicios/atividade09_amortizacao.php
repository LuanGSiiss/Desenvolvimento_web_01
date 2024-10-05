<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade 09</title>
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
                <select name="qtdParcelas">
                    <option value="24">24 Vezes</option>
                    <option value="36">36 Vezes</option>
                    <option value="48">48 Vezes</option>
                    <option value="60">60 Vezes</option>
                </select>
            </p>
            

            <button type="submit">Enviar</button>
        </fieldset>
    </form>
</body>
</html>

<!--PARTE DO PHP-->
<?php

    function calculoValorParcela($taxaJuros, $capital, $qtdParcelas) {
        $valorJuros = $capital * $taxaJuros * ((1 + $taxaJuros) ** $qtdParcelas) ;
        return $valorJuros / (((1 + $taxaJuros) ** $qtdParcelas) - 1);
    }

    // CHAMANDO O CODIGO PRINCIPAL AO SER ENVIADO O FORMS
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        chamadaPrincipal();
    };
    
    function chamadaPrincipal() {
        try {
            //Verifica os parametros
            if (!isset($_POST['valorEmprestimo'])) {
                throw new Exception("Os todos os parametros são obrigatórios.");
            }
            if (!is_numeric($_POST['valorEmprestimo'])) {
                throw new Exception("Os parâmetros precisam ser numericos");
            }
            if ($_POST['valorEmprestimo'] < 0) {
                throw new Exception("As quantidades não podem ser negativas");
            }

            $capital = $_POST['valorEmprestimo'];
            $qtdParcelas = $_POST['qtdParcelas'];
            $valorParcela = 0;
        
            switch ($qtdParcelas) {
                case 24:
                    $valorParcela = calculoValorParcela(0.020, $capital, $qtdParcelas);
                    break;
                case 36:
                    $valorParcela = calculoValorParcela(0.023, $capital, $qtdParcelas);
                    break;
                case 48:
                    $valorParcela = calculoValorParcela(0.026, $capital, $qtdParcelas);
                    break;
                case 60:
                    $valorParcela = calculoValorParcela(0.029, $capital, $qtdParcelas);
                    break;
            }
            echo "Você escolheu " . $qtdParcelas . " parcelas <br>";
            echo "O valor de cada parcela fica R$" . $valorParcela;
            
        } catch(Exception $e) {
            echo "Mensagem do erro: " . $e->getMessage();
        }
    }
?>