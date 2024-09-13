<?php
    $nome = "Luan"; //Esta é uma variavel, são declaradas e usadas com "$"
    define("CONSTANTE", "123"); //Está é uma constante, usa-se o "define()" para sua criação
    $junto = $nome . ' ' . CONSTANTE; // Constantes não podem ser usadas direto no "echo". Outra fato importante, o simbolo "." faz a concatenação de variaveis e constantes
    echo "Meu nome é $junto"; // "echo" produz uma saida, escrevendo na tela
?>