<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade 01</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
        <fieldset>
            <p>
                <label for="num01">Primeiro número</label>
                <input type="number" name="num01" id="num01"  required>
            </p>
            <p>
                <label for="num02">Segundo número</label>
                <input type="number" name="num02" id="num02" required>
            </p>
            <p>
                <label for="num03">Terceiro número</label>
                <input type="number" name="num03" id="num02"required>
            </p>

            <button type="submit">Enviar</button>
        </fieldset>
    </form>
</body>
</html>

<!--PARTE DO PHP-->
<?php
    function escreveAzul($mensagem) {
        echo '<p style="color:blue">' . $mensagem . '</p>';
    }
    function escreveVerde($mensagem) {
        echo '<p style="color:green">' . $mensagem . '</p>';
    }
    function escreveVermelho($mensagem) {
        echo '<p style="color:red">' . $mensagem . '</p>';
    }

    // CHAMANDO O CODIGO PRINCIPAL AO SER ENVIADO O FORMS
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        chamadaPrincipal();
    };
    
    function chamadaPrincipal() {
        try {
            //Verifica os parametros
            if (!isset($_POST['num01']) || !isset($_POST['num02']) || !isset($_POST['num03'])) {
                throw new Exception("Os todos os parametros são obrigatórios.");
            }
            if (!is_numeric($_POST['num01']) || !is_numeric($_POST['num02']) || !is_numeric($_POST['num03'])) {
                throw new Exception("Os parâmetros precisam ser numericos");
            }
            
            $num1 = $_POST['num01'];
            $num2 = $_POST['num02'];
            $num3 = $_POST['num03'];
            
            $soma = $num1 + $num2 + $num3;
            $textoPronto = "Soma de " . $num1 . ' + ' . $num2 . ' + ' . $num3. ' é = ' . $soma;
    
            switch(true) {
                case $num1 > 10:
                    escreveAzul($textoPronto);
                    break;
                case $num2 < $num3:
                    escreveVerde($textoPronto);
                    break;
                case $num3 < $num1 && $num3 < $num2:
                    escreveVermelho($textoPronto);
                    break;
                default:
                    echo $textoPronto;
            }
        } catch(Exception $e) {
            echo "Mensagem do erro: " . $e->getMessage();
        }
    }
?>