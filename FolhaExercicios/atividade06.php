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
                <label for="qtdMaca">Quantidade de Maça (Em Kilos):</label>
                <input type="number" step="0.01" name="qtdMaca" value="0" required>
            </p>
            <p>
                <label for="qtdMelancia">Quantidade de Melancia (Em Kilos):</label>
                <input type="number" step="0.01" name="qtdMelancia" value="0" required>
            </p>
            <p>
                <label for="qtdLaranja">Quantidade de Laranja (Em Kilos):</label>
                <input type="number" step="0.01" name="qtdLaranja" value="0" required>
            </p>
            <p>
                <label for="qtdRepolho">Quantidade de Repolho (Em Kilos):</label>
                <input type="number" step="0.01" name="qtdRepolho" value="0" required>
            </p>
            <p>
                <label for="qtdCenoura">Quantidade de Cenoura (Em Kilos):</label>
                <input type="number" step="0.01" name="qtdCenoura" value="0" required>
            </p>
            <p>
                <label for="qtdBatatinha">Quantidade de Batatinha (Em Kilos):</label>
                <input type="number" step="0.01" name="qtdBatatinha" value="0" required>
            </p>
            

            <button type="submit">Enviar</button>
        </fieldset>
    </form>
</body>
</html>

<!--PARTE DO PHP-->
<?php
    //Declarando variaveis inicias
    $saldoIncial = 50;
    
    function calculoCusto($macas, $melancias, $laranjas, $repolhos, $cenouras, $batatinhas) {
        $valorKgMaca = 18;
        $valorKgMelancia = 23;
        $valorKgLaranja = 25;
        $valorKgRepolho = 31;
        $valorKgCenoura = 15;
        $valorKgMBatatinha = 13;

        $custo = ($macas * $valorKgMaca) + ($melancias * $valorKgMelancia) + ($laranjas * $valorKgLaranja) + ($repolhos * $valorKgRepolho) + ($cenouras * $valorKgCenoura) + ($batatinhas * $valorKgMBatatinha);
        return $custo;
    }
    // CHAMANDO O CODIGO PRINCIPAL AO SER ENVIADO O FORMS
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        chamadaPrincipal($saldoIncial);
    };
    
    function chamadaPrincipal($saldo) {
        try {
            //Verifica os parametros
            if (!isset($_POST['qtdMaca']) || !isset($_POST['qtdMelancia']) || !isset($_POST['qtdLaranja']) || !isset($_POST['qtdRepolho']) || !isset($_POST['qtdCenoura']) || !isset($_POST['qtdBatatinha'])) {
                throw new Exception("Todos os parametros são obrigatórios.");
            }
            if (!is_numeric($_POST['qtdMaca']) || !is_numeric($_POST['qtdMelancia']) || !is_numeric($_POST['qtdLaranja']) || !is_numeric($_POST['qtdRepolho']) || !is_numeric($_POST['qtdCenoura']) || !is_numeric($_POST['qtdBatatinha'])) {
                throw new Exception("Os parâmetros precisam ser numericos");
            }
            if ($_POST['qtdMaca'] < 0 || $_POST['qtdMelancia'] < 0 || $_POST['qtdLaranja'] < 0 || $_POST['qtdRepolho'] < 0 || $_POST['qtdCenoura'] < 0|| $_POST['qtdBatatinha'] < 0) {
                throw new Exception("As quantidades não podem ser negativas");
            }
            $macas = $_POST['qtdMaca'];
            $melancias = $_POST['qtdMelancia'];
            $laranjas = $_POST['qtdLaranja'];
            $repolhos = $_POST['qtdRepolho'];
            $cenouras = $_POST['qtdCenoura'];
            $batatinhas = $_POST['qtdBatatinha'];
            
            $custoTotal = calculoCusto($macas, $melancias, $laranjas, $repolhos, $cenouras, $batatinhas);
            $diferenca = $saldo - $custoTotal;
            
            echo "Saldo total: " . $saldo . "<br>";
            echo "Valor da Compra: R$" . $custoTotal;
            if ($diferenca < 0) {
                echo '<p style="color:red">O custo total passou em R$' . ($diferenca * (-1))  . ' do saldo</p>';
            } else if ($diferenca > 0) {
                echo '<p style="color:blue">Ainda pode ser gasto R$' . $diferenca . ' do saldo</p>';
            } else {
                echo '<p style="color:green">Saldo para compra esgotado</p>';
            }

    
        } catch(Exception $e) {
            echo "Mensagem do erro: " . $e->getMessage();
        }
    }
?>
