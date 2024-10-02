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

    // Nomes dos parametros num1, num2, num3
    try {
        //Verifica os parametros
        if (!isset($_REQUEST['num1']) || !isset($_REQUEST['num2']) || !isset($_REQUEST['num3'])) {
            throw new Exception("Os parâmetros 'valor' e 'desconto' são obrigatórios.");
        }
        if (!is_numeric($_REQUEST['num1']) || !is_numeric($_REQUEST['num2']) || !is_numeric($_REQUEST['num3'])) {
            throw new Exception("Os parâmetros 'valor' e 'desconto' precisam ser numericos");
        }
        
        $num1 = $_REQUEST['num1'];
        $num2 = $_REQUEST['num2'];
        $num3 = $_REQUEST['num3'];
        
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


//     Criar um programa que execute a soma de três valores.
// Se a primeira variável for maior que 10, escrever o resultado da operação em azul
// Se a segunda variável for menor que a terceira, escrever o resultado em verde
// Se a terceira variável for menor que a primeira e a segunda variável escrever o
// resultado em vermelho
?>


