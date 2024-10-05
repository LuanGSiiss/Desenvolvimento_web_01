<?php
    $pastas = [
        "bsn" => [
            "3a Fase" => ["desenvWeb", "bancoDados 1", "engSoft 1"], 
            "4a Fase" => ["Intro Web", "bancoDados 2", "engSoft"]
            ]
        ];

    function escreveRecursivo($objeto, $nivel = 1) {
        $indentacao = str_repeat('-', $nivel);
        foreach ($objeto as $key => $value) {
            if(is_numeric($key)) {
                echo  $indentacao . " " . $value . "<br>";
            } else {
                echo  $indentacao . " " . $key . "<br>";
            }
            if (is_array($value)) {
                escreveRecursivo($value, $nivel + 1);
            }
        }
    }
    
    escreveRecursivo($pastas);
?>