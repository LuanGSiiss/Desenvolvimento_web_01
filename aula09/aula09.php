<?php
    // Usando funções
    function exibeMensagem($nome) {
        echo "Olá Mundo, aqui é o " . $nome;
    }

    exibeMensagem("Luan");
    echo "<br>";
    
    // Definindo valores padrão aos parametro e tipos primitivos
    function metroquadrado(int $lado1 = 1, int $lado2 = 1) {
        return $lado1 * $lado2;
    }
    echo metroquadrado(4);

    echo "<br>";
    function exibeMensagem2($mensagem) {
        echo $mensagem;
    }
    exibeMensagem2("Total M2: " . metroquadrado(10,10));

    echo "<br>";

    // É possível usar argumentos por referência ou copia
    // Usando por copia, a valor da variavel é passada pra o parametro da função e não afeta a variavel externa
    // Já a por referência, o parametro recebe o endereço de memoria da variavel e as alterações dentro da função alteram a variavel externa.

    $salarioBruto = 0;
    $impostos = 0;
    $liquido = 0;
    // o "&" informa que a variavel será por referência 
    function calculaFolhaPagto(&$bruto, &$imposto, &$liquido) {
        $bruto = 10000;
        $imposto = 1000;
        $liquido = $bruto - $imposto;
    }

    calculaFolhaPagto($salarioBruto, $impostos, $liquido);
    echo "Bruto: " . $salarioBruto . " Imposto: " . $impostos . " Líquido: " . $liquido;
?>