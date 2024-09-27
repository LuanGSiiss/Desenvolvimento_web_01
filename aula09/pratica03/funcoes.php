<?php
    function media(array $notas) {
        $soma = 0;
        foreach ($notas as $nota) {
            $soma += $nota;
        }
        return $soma / count($notas);
    }

    // Verifica se passou
    function verificaAprovadoNota(float $mediaAluno) {
        if ($mediaAluno > 7) {
            return "Aprovado";
        }
        return "Reprovado";
    }

    // frequencia Aluno
    function frequencia(array $participacao) {
        $presenca = 0;
        foreach ($participacao as $dia) {
            if($dia === "P") {
                $presenca++;
            }
        }
        return $presenca / count($participacao);
    }

    // Verifica se passou por frequencia

    function verificaAprovadoFrequencia(float $frequenciaAluno) {
        if ($frequenciaAluno > 0.7) {
            return "Aprovado";
        }
        return "Reprovado";
    }
?>