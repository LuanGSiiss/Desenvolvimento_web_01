<?php
    require_once("funcoes.php");

    $notasAluno1 = [7, 4, 6, 10, 9, 9];
    $faltasAluno1 = ["F", "P", "P", "P", "P", "P", "F", "P", "F", "P"];

    echo "Media aluno: " . media($notasAluno1) . "; Status: " . verificaAprovadoNota(media($notasAluno1)) . "<br>";
    echo "Frequencia aluno: " . frequencia($faltasAluno1) . "; Status: " . verificaAprovadoFrequencia((frequencia($faltasAluno1))) . "<br>";

?>