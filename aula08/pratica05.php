<?php

    $disciplinas = array("Banco de Dados 02", "Estrutura de Dados 02", "Administração e Sistemas de Informação", "Engenharia de Software 02", "Programação Web");
    $tutores = array("Marco Aurélio Butzke", "Fernando Bastos", "Sandro Alencar Fernandes", "Julian Hermann Creutzberg", "Cleber Nardelli" );
    
    for ($i = 0; $i < 5; $i++) {
        echo "Disciplina $disciplinas[$i], professor $tutores[$i];<br>";
    }
?>
