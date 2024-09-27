<?php
    try {
        //Verifica os parametros
        if (!isset($_REQUEST['valor']) || !isset($_REQUEST['desconto'])) {
            throw new Exception("Os parâmetros 'valor' e 'desconto' são obrigatórios.");
        }
        if (!is_numeric($_REQUEST['valor']) || !is_numeric($_REQUEST['desconto'])) {
            throw new Exception("Os parâmetros 'valor' e 'desconto' precisam ser numericos");
        }
        if ($_REQUEST['valor'] < 1 || ($_REQUEST['desconto'] < 0 || $_REQUEST['desconto'] > 1)) {
            throw new Exception("Os parãmetros são inválidos"); 
        }

        $valor = $_REQUEST['valor'];
        $desconto = $_REQUEST['desconto'];
        
        $valor_final = $valor * (1 - $desconto);

        echo "Valor = " . $valor . "; Desconto = " . $desconto . "<br>";
        echo "Valor Final = " . $valor_final;
    } catch (Exception $e) {
        echo "Erro capturado: " . $e->getMessage();
    }

?>